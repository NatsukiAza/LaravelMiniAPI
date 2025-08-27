<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DateTime;

class IndexController extends Controller
{
    public function index()
    {
        $url = 'https://reclutamiento-dev-procontacto-default-rtdb.firebaseio.com/reclutier.json';
        $jsonContent = @file_get_contents($url);
        $data = $jsonContent ? json_decode($jsonContent, true) : null;
        return view('index', ['reclutas' => $data]);
    }

    public function store(Request $request)
    {
        $url = 'https://reclutamiento-dev-procontacto-default-rtdb.firebaseio.com/reclutier.json';

        $rules = [
            'birthday' => [
                'date_format:Y/m/d',
                'before_or_equal:today',
                'after_or_equal:1900-01-01'],
            'documentType' => 'in:CUIT,DNI', 
        ];

        $messages = [
            'documentType.in' => 'El tipo de documento debe ser CUIT o DNI',
            'birthday.date_format' => 'El formato de la fecha debe ser YYYY/MM/DD.',
            'birthday.before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
            'birthday.after_or_equal' => 'La fecha de nacimiento no puede ser anterior a 1900.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 400); 
        }

        $formData = [
            'name' => ucwords($request->input('name')),
            'suraname' => ucwords($request->input('suraname')),
            'birthday' => $request->input('birthday'),
            'age' => null,
            'documentType' => $request->input('documentType'),
            'documentNumber' => $request->input('documentNumber')
        ];

        $nacimiento = new DateTime($formData['birthday']);
        $hoy = new DateTime();
        $diferencia = $hoy->diff($nacimiento);
        $edad = $diferencia->y;
        $formData['age'] = $edad;
        $jsonData = json_encode($formData);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        curl_exec($ch);
        curl_close($ch);
        return redirect()->to('/');
    }
}