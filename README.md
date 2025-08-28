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

HSTS es una política de seguridad web que obliga a los navegadores a interactuar con sitios web solamente usando conexiones seguras (HTTPS). Esto mejora la seguridad de una aplicación web ya que previene los ataques man in the middle o secuestro de cookies al usar un protocolo mas seguro.

-   ¿Qué es un ataque "downgrade" y cómo HTTPS lo previene?

Un ataque downgrade se basa en interceptar la comunicación entre un cliente y servidor (como man in the middle) para forzarlos a utilizar un protocolo o algoritmo de cifrado menos seguro para así exponer los datos, leerlos o manipularlos. HTTPS no previene por si solo el ataque ya que la vulnerabilidad explotada es antes de que se establezca una conexión cifrada, lo que si lo previene es HSTS ya que no se puede acceder al dominio sin usar el protocolo HTTPS.

-   ¿Qué es el CORS (Cross-Origin Resource Sharing) y cómo se implementa en una aplicación web?

CORS es un mecanismo de seguridad que implementado en los navegadores para permitir o bloquear que una aplicacion web acceda a recursos de un dominio diferente. Esta se implementa en el servidor, el cual debe configurar header de respuesta HTTP para indicar que origenes, metodos y cabeceras tienen permiso para acceder a sus recursos.

-   ¿Qué diferencia hay entre una cabecera Authorization y una cabecera Cookie?

El header Authorization es usado para enviar credenciaes de autenticación, mientras que el header Cookie amacena fragmentos de datos de estado de la sesión en el navegador para su uso en el futuro.

-   ¿Qué son las cabeceras de seguridad como Content-Security-Policy o X-Frame-Options? ¿Cómo ayudan a mitigar ataques comunes?

Las cabeceras de seguridad son un tipo de cabeceras HTTP que envía un servidor para dar instrucciones al navegador sobre como comportarse con el contenido de la página. para garantizar una mayor protección al ceder control de navegador al servidor. El proposito principal que tienen es limitar las acciones que se pueden realizar desde el navegador para prevenir riesgos de seguridad mitigando así los ataques mas comunes.

-   ¿Cuáles son las diferencias entre HTTP/1.1, HTTP/2 y HTTP/3?

Las principales diferencias entre estas versiones son de velocidad y eficiencia, HTTP/1.1 usaba una sola solicitud y respuesta por conexión TCP por lo que si una se demoraba las demas debian esperar o abrir otra conexión lo cual requieria hacer otro handshake y era ineficiente. Con HTTP/2 Se mejoro esta problematica para admitir varias solicitudes y respuestas al mismo tiempo en una sola conexión TCP, mejorando la eficiencia y rapidez. Con HTTP/3 se cambió el protocolo por completo de TCP a QUIC (el cual utiliza UDP), esto permite a los clientes cambiar de red sin que una conexión se interrumpa y es mas rapido para completar handshakes.

-   ¿Qué es un "keep-alive" en HTTP y cómo mejora el rendimiento de las aplicaciones?

Un keep-alive es una forma de operar conexiones TCP entre un cliente y un servidor para que estas no se cierren luego de una solicitud, permaneciendo abierta con una conexión persistente. Esto mejora el rendimiento de las aplicaciones ya que con una conexión persistente no se requiere volver a hacer un hanshake por cada solicitud, mientras que si cerraramos esa conexión deberiamos volver a preparar la comunicación encriptada.

## Preguntas de implementación práctica:

-   ¿Cómo manejarías la autenticación en una API basada en HTTP/HTTPS? ¿Qué métodos conoces (Basic, OAuth, JWT, etc.)?

He trabajado con metodos JWT, por lo que para manejar la autenticación en una API yo verificaria las credenciales a traves de una solicitud POST que enviaría el cliente para que despues el servidor genere un JSON Web Token que contenga datos de usuario relevantes para la autenticación, este token se firma digitalmente con una clave secreta para garantizar integridad, luego el servidor enviaría ese token al cliente y este lo guardaría en su navegador ya sea por localStorage o Cookies. Este token luego se utiliza en las solicitudes a recursos protegidos agregandolo al header Authorization para que el servidor pueda validarlo rapidamente y permitir o denegar el acceso a dicho recurso.

-   ¿Qué es un proxy inverso (reverse proxy) y cómo se utiliza en entornos HTTP/HTTPS?

Un proxy inverso es un servidor situado entre el cliente y el servidor que actua como intermediario para gestionar las solicitudes y respuestas. La diferencia con un proxy normal es que este se sitúa del lado del servidor para recibir solicitudes y distribuirlas a los servidores internos, de esta forma el cliente se comunica con el proxy inverso y nunca tiene conocimiento de los servidores de origen. En HTTP/HTTPS se utiliza para mejorar el rendimiento y seguridad de las conexiones al distribuir las conexiones para evitar sobrecarga de un servidor, ocultar las ip de servidores de origen y usar cache para responder rapidamente sin contactar al servidor de origen.

-   ¿Cómo implementarías una redirección automática de HTTP a HTTPS en un servidor?

Configuraría al servidor para que responda a todas las solicitudes del puerto 80 con una redirección de estado 301 (Moved permanently) a la misma URL pero que cuenta con el protocolo HTTPS.

-   ¿Cómo mitigarías un ataque de denegación de servicio (DDoS) en un servidor HTTP?

Configuraría mi servidor para limitar la cantidad de solicitudes desde una misma dirección ip en un tiempo determinado, para que si se supera este limite las solicitudes devuelvan un codigo 429 (Too many requests) y no colapsen o sobrecargen el servidor.

-   ¿Qué problemas podrías enfrentar al trabajar con APIs que dependen de HTTP, y cómo los resolverías?

Los problemas que podría enfrentar serian de seguridad, ya que al no estar encriptados los datos cualquiera podría interceptarlos, leerlos y manipularlos. Para resolver esta problematica trataría de encontrar una forma de usar HTTPS al implementar HSTS o buscando otra API. De no ser posible limitaria la información que envío a información no sensible para limitar el riesgo de un atacante interceptando estos datos.

-   ¿Qué es un cliente HTTP? ¿Mencionar la diferencia entre los clientes POSTMAN y CURL?

Un cliente HTTP es una herramienta utilizada para enviar solicitudes HTTP a servidores web, recibir y procesar sus respuestas. Las diferencias entre Postman y CURL es que Postman es una plataforma con GUI que ofrece un entorno visual intuitivo para construir y probar APIS, mientras que CURL es un CLI por lo que no tiene una interfaz tan amigable para el usuario pero es ligero y potente.

## Preguntas de GIT

-   ¿Qué es GIT y para qué se utiliza en desarrollo de software?

GIT es un sistema de control de versiones, es decir que se utiliza para rastrear los cambios que se le hacen a los archivos a lo largo del tiempo, permitiendo que multiples personas trabajen de manera simultanea en el mismo codigo. GIT se utiliza en el desarrollo de software para colaborar en equipo, ver historiales de cambio, gestionar ramas y tener respaldos de un proyecto.

-   ¿Cuál es la diferencia entre un repositorio local y un repositorio remoto en GIT?

La diferencia entre un repositorio local y uno remoto es donde se ubican y su proposito. El local se encuentra en la pc del usuario donde es editado, mientras que el remoto esta en un servidor externo como puede ser GitHub y se usa para la colaboración y el almacenamiento como respaldo.

-   ¿Cómo se crea un nuevo repositorio en GIT y cuál es el comando para inicializarlo?
    Explica la diferencia entre los comandos git commit y git push.

Para crear un repositorio en GIT primero se crea una carpeta para el proyecto, luego se utiliza el comando git init para inicializar el repositorio y crear una carpeta .git que contiene el historial del proyecto. La diferencia entre git commit y git push es su alcance, git commit se utiliza para guardar los cambios en el repositorio local, es decir, nada se envia al servidor, mientras que git push es un comando para enviar los cambios del repositorio local al repositorio remoto.

-   ¿Qué es un "branch" en GIT y para qué se utilizan las ramas en el desarrollo de software?

Un branch es una copia del proyecto almacenado en el repositorio remoto que se utiliza para enviar cambios al repositorio remoto sin interferir con el principal. Principalmente se utilizan para aislar el trabajo sin romper el codigo de una rama principal o desarrollar simultaneamente en diferentes funciones del proyecto en ramas diferentes.

-   ¿Qué significa hacer un "merge" en GIT y cuáles son los posibles conflictos que pueden surgir durante un merge?

Hacer un merge significa combinar los cambios de una rama a otra, pueden surgir conflictos cuando Git no puede fusionar los cambios por si solo porque se modificaron las mismas lineas de forma diferente, un desarrollador borro una parte del codigo y otro la modifico o un desarrollador movio un archivo y otro lo dejo en su ubicación original. Git no tiene manera de saber cual es la version correcta por lo que detiene el proceso de merge y le pide al desarrollador que resuelva el conflicto editando manualmente.

-   Describe el concepto de "branching model" en GIT y menciona algunos modelos comunes (por ejemplo, Git Flow, GitHub Flow).

Branching model es una estrategia que aplica un equipo de desarrollo para organizar el flujo de trabajo en un repositorio. Este define como y cuando se crean, nombran, usan y fusionan ramas para gestionar el desarrollo, las versiones y las correciones de errores de manera consistente y eficiente. Algunos modelos comunes son Git Flow, un modelo complejo pero ideal para proyectos con multiples versiones en mantenimiento, Github Flow, un modelo mas simple que se basa en dos ramas principales (main y feature/ ), GitLab Flow, que evoluciona de GitHub Flow añadiendo ramas de entorno pero conservando la simplicidad, entre otros.

-   ¿Cómo se deshace un cambio en GIT después de hacer un commit pero antes de hacer push?

Para deshacer un cambio en Git después de un commit pero antes de un push se utilizan varios comandos dependiendo de lo que se quiera lograr. Lo importante es que, como los cambios aún están en tu repositorio local, podes modificarlos sin afectar el repositorio remoto. Los comandos para esto son git reset HEAD~1 que deshace el ultimo commit pero conserva los cambios o git reset --hard HEAD~1 que agrega el --hard para borrar los cambios hechos en el ultimo commite.

-   ¿Qué es un "pull request" y cómo contribuye a la revisión de código en un equipo?

Un pull request es una solicitud que un desarrollador envía a un repositorio remoto para proponer que sus cambios sean fusionados en una rama principal. Es el método utilizado para colaborar en repositorios en plataformas como GitHub. Este contribuye a la revision del código al notificar, contener descripción de los cambios, aceptar comentarios, revisiones.

-   ¿Cómo puedes clonar un repositorio de GIT y cuál es la diferencia entre git clone y git pull?

Para clonar un repositorio de Git se usa el comando git clone seguido de la URL del repositorio. Este comando crea una copia local completa del repositorio que incluye todos los archivos y el historial de commits. La diferencia entre git clone y git pull es que git clone se usa para obtener el repositorio por primera vez, mientras que git pull se usa para actualizar un repositorio local que ya tenes.

## Preguntas de PHP con Laravel

-   ¿Qué es Laravel?

Laravel es un framework de código abierto para aplicaciones web en PHP. Proporciona una estructura robusta y herramientas preconstruidas que simplifican el desarrollo de aplicaciones web complejas.

-   ¿Cómo maneja Laravel el modelo de ejecución de peticiones HTTP y en qué se diferencia del manejo tradicional en PHP puro?

Laravel maneja el modelo de ejecución de peticiones HTTP de manera centralizada y estructurada a través de un modelo de enrutamiento, lo que se diferencia significativamente del enfoque tradicional en PHP puro, que es más descentralizado y propenso a errores.

-   ¿Qué es el ciclo de vida de una petición en Laravel y cuál es el rol del Kernel (HTTP Kernel) en dicho proceso?

El ciclo de vida de una petición en Laravel es la secuencia de pasos que sigue una solicitud HTTP, desde que llega a la aplicación hasta que se envía una respuesta de vuelta al usuario. El Kernel HTTP es el componente central en ese proceso, ya que actúa como un cerebro que orquesta la ejecución de la petición.

-   ¿Cuál es la diferencia entre require/include de PHP y el sistema de autoloading de Composer en Laravel?

La principal diferencia radica en la gestión de dependencias y el momento de la carga. require e include cargan archivos de forma manual y síncrona, mientras que el sistema de autoloading de Composer carga las clases de forma automática y solo cuando se las necesita.

-   ¿Qué es Composer y cuál es su función dentro del ecosistema de PHP y Laravel?

Composer es un gestor de dependencias para PHP. Es una herramienta que ayuda con la instalación, actualización y gestión de las bibliotecas y paquetes que el proyecto necesita para funcionar. En lugar de tener que descargar manualmente cada biblioteca, Composer se encarga de eso.

-   ¿Cómo se inicializa un nuevo proyecto de Laravel usando Composer y cuál es el propósito del archivo composer.json?

Para inicializar un nuevo proyecto se utiliza el comando "composer create-project laravel/laravel nombre". Este comando le indica a Composer que descargue y configure Laravel en un nuevo directorio, listo para su uso. El archivo composer.json es el manual de instrucciones para Composer, diciéndole qué paquetes necesita el proyecto, cómo cargar sus clases y qué scripts ejecutar.

-   ¿Qué son las dependencias en Composer y cómo se instalan? Explica la diferencia entre dependencias normales y dependencias de desarrollo.

Las dependencias en Composer son las bibliotecas o paquetes de código que un proyecto necesita para funcionar. Para instalar las dependencias se usa el archivo composer install que lee el archivo composer.json, descarga los paquetes necesarios de Packagist y los guarda en la carpeta vendor/.
la diferencia entre dependencias normales y dependencias de desarrollo es que las dependencias normales son los paquetes que la aplicación necesita para funcionar en producción. el código de estos paquetes se ejecuta en el servidor web cuando la aplicación está en vivo y es accesible por el usuario final, mientras que las dependencias de desarrollo son los paquetes que solo se necesitan para el proceso de desarrollo, depuración y pruebas.

-   ¿Cómo puedes gestionar versiones específicas de paquetes en Composer y cuál es el propósito del archivo composer.lock?

Se puede gestionar versiones específicas de paquetes en Composer usando un sistema de constraints en el archivo composer.json especificando la versión exacta, un rango de versiones o un comportamiento flexible. El proposito del archivo composer.lock es garantizar que todos los desarrolladores que trabajan en el proyecto utilicen las mismas versiones de las dependencias.

-   ¿Qué es Eloquent ORM y cómo facilita la interacción con bases de datos en Laravel?

Eloquent ORM es el mapeador objeto-relacional de Laravel. Proporciona una forma simple y elegante de interactuar con la base de datos de la aplicación, permitiendo manejar las tablas como si fueran objetos de PHP. Esto simplifica la interacción con la base de datos al eliminar la necesidad de escribir la mayoría de las consultas SQL manuales.

-   ¿Cómo se manejan errores en Laravel? Explica el rol del Handler, el uso de excepciones personalizadas y cómo se combinan con middlewares y validaciones.

Laravel maneja los errores y las excepciones de forma centralizada y robusta, lo que facilita su gestión y respuesta. El Handler es una clase central que captura todas las excepciones que no son gestionadas por la aplicación. Las excepciones personalizadas son para manejar errores específicos de la lógica de negocio de la aplicación, esto mejora la legibilidad del código y permite un mejor manejo de errores. Los middlewares y las validaciones de Laravel se utilizan para manejar los errores y proteger la aplicación antes de que la petición llegue al controlador.
