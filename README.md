# LaravelMiniAPI

# Preguntas teoricas:

## Preguntas generales sobre HTTP/HTTPS:

-   ¿Qué es HTTP y cuál es su función principal?

HTTP es un protocolo de comunicación que permite la transferencia de información en la web. La funcion principal de este es ser una base para el intercambio de datos entre cliente y servidor.

-   ¿Cuál es la diferencia entre HTTP y HTTPS?

La diferencia entre HTTP y HTTPS es la seguridad, HTTPS encripta los datos enviados para que un tercero no pueda leerlos por mas que intercepte la conexion.

-   ¿Cómo funciona el proceso de cifrado en HTTPS?

El proceso de cifrado se realiza con un cifrado asimétrico (handshake) y uno simétrico. En el primero el cliente hace una peticion de conexion cifrada al servidor, luego el servidor responde con su certificado SSL/TLS, el navegador verifica la validez de mismo y envia una clave de sesion encriptada con la clave publica del servidor, por ultimo el servidor la recibe y desencripta con su clave privada para que los dos puedan empezar a encriptar los datos con la misma clave de sesion. Luego de eso vienen los cifrados simetricos que se realizan a los datos enviados con la clave de sesion que comparten el cliente y servidor.

-   ¿Qué es un certificado SSL/TLS y cuál es su importancia en HTTPS?

Un certificado SSL/TLS es un archivo digital que contiene información crucial para la comunicación entre el servidor y cliente como una firma digital que autentica al servidor o la clave publica para iniciar el handshake. Es importante ya que sin el, el cliente no podria autenticar que el servidor es quien dice ser y no un sitio fraudulento, ademas de contener la clave publica que es la base sobre la cual se establece una conexion segura y trasmitir la clave de sesion.

-   ¿Qué es un método HTTP? ¿Podrías enumerar algunos de los más utilizados?

Un metodo HTTP es una instruccion que comunica al servidor que se debe hacer con los recursos de una URL. Los mas utilizados son GET, que recupera un recurso del servidor sin hacer cambios en el, POST, que se utiliza para enviar datos al servidor, PUT, que actualiza un recurso ya existente y DELETE, que elimina un recurso especifico del servidor.

-   Explica las diferencias entre los métodos HTTP GET y POST.

El metodo HTTP GET se utiliza para leer informacion del servidor sin modificarla, mientras que el metodo PUT envia datos al servidor y crea un nuevo recurso.

-   ¿Qué es un código de estado HTTP? ¿Podrías mencionar algunos de los más comunes y lo que significan?

Un codigo de estado HTTP es un mensaje de 3 digitos que el servidor envía al navegador como respuesta a una petición, estos codigos indican si la petición fue exitosa o si hubo un error. Los mas comunes suelen ser 404 (Not Found), significa que el recurso solicitado no se encontró, 200 (OK), siginifica que la peticion fue realizada con exito, 500 (Internal Server Error), es un error generico que indica que algo salio mal en el servidor pero sin especificar que fue lo que salio mal.

-   ¿Qué es una cabecera HTTP? Da ejemplos de cabeceras comunes.

Las cabeceras HTTP son pares de nombres y valores que se envian en las peticiones o las respuestas HTTP para proporcionar información adicional de las mismas. Cabeceras comunes suelen ser Content-Type, la cual especifica el tipo de dato que se esta enviando si la peticion tiene body, Cookie, que contiene las cookies del navegador o User-Agent, que identifica el tipo de navegador y sistema operativo del cliente.

-   ¿En qué consiste el concepto de "idempotencia" en los métodos HTTP? ¿Qué métodos cumplen con esta característica?

El concepto de idempotencia consiste en que una solicitud se puede repetir muchas veces pero siempre va a tener el mismo resultado en el servidor. Los metodos que cumplen esta caracteristica son GET, HEAD, PUT y DELETE.

-   ¿Qué es un redirect (redirección) HTTP y cuándo es utilizado?

Un redirect es una repuesta del servidor que le informa al navegador que el recurso solicitado no se encuentra en esa URL, luego devuelve un estado del grupo 300 junto con un header Location que contiene la nueva URL. Estos se utilizan cuando se migra un sitio web, se cambia de dirección una pagina o si hay algun mantenimiento para redireccionar a una pagina que lo informe.

## Preguntas técnicas y de seguridad en HTTP/HTTPS:

-   ¿Cómo se asegura la integridad de los datos en una conexión HTTPS?

La integridad de los datos se asegura mediante funciones hash criptograficas, si se altera un solo bit de los datos, el hash cambia y el receptor puede identificar que el mensaje fue manipulado.

-   ¿Qué diferencia hay entre un ataque de "man-in-the-middle" y un ataque de "replay" en un contexto HTTPs?

    Un ataque man in the middle pone al atacante en medio de la comunicación para interceptar, leer y modificar los datos enviados en el momento exacto que se envian. Mientras que un ataque de replay retransmite una comunicación válida y completa que se ha capturó previamente, sin alterarla.

-   Explica el concepto de "handshake" en HTTPS.

El hanshake es el proceso de inicio de comunicación entre un cliente y un servidor para establecer una conexión segura HTTPS. Esencialmente es una preparación antes de comunicar datos importantes para poder encriptarlos y autenticar al servidor.

-   ¿Qué es HSTS (HTTP Strict Transport Security) y cómo mejora la seguridad de una aplicación web?

-   ¿Qué es un ataque "downgrade" y cómo HTTPS lo previene?

-   ¿Qué es el CORS (Cross-Origin Resource Sharing) y cómo se implementa en una aplicación web?

-   ¿Qué diferencia hay entre una cabecera Authorization y una cabecera Cookie?

-   ¿Qué son las cabeceras de seguridad como Content-Security-Policy o X-Frame-Options? ¿Cómo ayudan a mitigar ataques comunes?

-   ¿Cuáles son las diferencias entre HTTP/1.1, HTTP/2 y HTTP/3?

-   ¿Qué es un "keep-alive" en HTTP y cómo mejora el rendimiento de las aplicaciones?

## Preguntas de implementación práctica:

¿Cómo manejarías la autenticación en una API basada en HTTP/HTTPS? ¿Qué métodos conoces (Basic, OAuth, JWT, etc.)?

¿Qué es un proxy inverso (reverse proxy) y cómo se utiliza en entornos HTTP/HTTPS?

¿Cómo implementarías una redirección automática de HTTP a HTTPS en un servidor?

¿Cómo mitigarías un ataque de denegación de servicio (DDoS) en un servidor HTTP?

¿Qué problemas podrías enfrentar al trabajar con APIs que dependen de HTTP, y cómo los resolverías?

¿Qué es un cliente HTTP? ¿Mencionar la diferencia entre los clientes POSTMAN y CURL?

## Preguntas de GIT

¿Qué es GIT y para qué se utiliza en desarrollo de software?

¿Cuál es la diferencia entre un repositorio local y un repositorio remoto en GIT?

¿Cómo se crea un nuevo repositorio en GIT y cuál es el comando para inicializarlo?
Explica la diferencia entre los comandos git commit y git push.

¿Qué es un "branch" en GIT y para qué se utilizan las ramas en el desarrollo de software?

¿Qué significa hacer un "merge" en GIT y cuáles son los posibles conflictos que pueden surgir durante un merge?

Describe el concepto de "branching model" en GIT y menciona algunos modelos comunes (por ejemplo, Git Flow, GitHub Flow).

¿Cómo se deshace un cambio en GIT después de hacer un commit pero antes de hacer push?

¿Qué es un "pull request" y cómo contribuye a la revisión de código en un equipo?

¿Cómo puedes clonar un repositorio de GIT y cuál es la diferencia entre git clone y git pull?

## Preguntas de PHP con Laravel

¿Qué es Laravel?

¿Cómo maneja Laravel el modelo de ejecución de peticiones HTTP y en qué se diferencia del manejo tradicional en PHP puro?

¿Qué es el ciclo de vida de una petición en Laravel y cuál es el rol del Kernel (HTTP Kernel) en dicho proceso?

¿Cuál es la diferencia entre require/include de PHP y el sistema de autoloading de Composer en Laravel?

¿Qué es Composer y cuál es su función dentro del ecosistema de PHP y Laravel?

¿Cómo se inicializa un nuevo proyecto de Laravel usando Composer y cuál es el propósito del archivo composer.json?

¿Qué son las dependencias en Composer y cómo se instalan? Explica la diferencia entre dependencias normales y dependencias de desarrollo.

¿Cómo puedes gestionar versiones específicas de paquetes en Composer y cuál es el propósito del archivo composer.lock?

¿Qué es Eloquent ORM y cómo facilita la interacción con bases de datos en Laravel?

¿Cómo se manejan errores en Laravel? Explica el rol del Handler, el uso de excepciones personalizadas y cómo se combinan con middlewares y validaciones.
