# Universidad Técnica Nacional.
Carrera:  Ingeniería del software.  
Curso:    Aplicaciones Web utilizando Software Libre.  
Profesor: Misael Matamoros Soto.  
Alumnos :    
- Gustavo Espinoza Corrales.  
- Diego Umaña.    

III Cuatrimestre 2023.

## Objetivos
Aplicar los conocimientos en programación de aplicaciones con requerimientos de rigurosidad
comercial, con lenguajes y componentes disponibles con licencia de Software Libre, mediante
la creación de una aplicación Web que interactúe con servicios de terceros, por medio del
consumo de APIs con permisos delegados por los usuarios.

## Enunciado
La empresa “**Social Hub Manager**” los ha contratado a ustedes para que desarrollen una
aplicación, que les permita poner en marcha un servicio web para la administración y
programación de publicaciones en redes sociales.

La solución es una aplicación web que deberá consumir los APIs de al menos dos redes
sociales distintas (entre Twitter, Facebook, Linkedin, Instagram, Pinterest), implementando
autorización por medio de oAuth, de manera que sus usuarios puedan autorizar a la
aplicación de Social Hub Manager a publicar entradas en su nombre. Por lo sensible que
podría resultar administrar múltiples redes sociales desde una aplicación centralizada, su
solución deberá permitir —a los usuarios que lo deseen—, activar un segundo factor de
autenticación por medio de un soft-token que genere un OTP (por ejemplo Google
Authenticator).

## Requerimientos   
1. **Pantalla de login y registro de usuarios**: Cualquier persona se deberá poder dar
de alta a la aplicación por medio de un formulario de registro, para posteriormente
iniciar sesión a través de un formulario de inicio de sesión, cada vez que requiera
utilizar la solución.

2. **Integración con redes sociales**: La aplicación deberá permitir a cada uno de sus
usuarios “conectar” su cuenta, a sus redes sociales, soportando al menos 2 de las más
populares, de manera que desde la aplicación se puedan hacer publicaciones.

3. **Publicación de entradas**: Deberá existir una pantalla para la publicación de
entradas, las cuales podrán ser simultaneas o individuales, en cualquiera de las redes
sociales administradas, pudiendo ser una publicación instantánea, enviada a la cola o
programada a una fecha y hora especifica.

4. **Horarios de publicación**: Cada usuario deberá tener la posibilidad de crear,
consultar, modificar o eliminar un horario de publicación de entradas, definiendo el día
de la semana y hora del día, pudiendo registrar varias horas distintas para un mismo
día.

*Ejemplo*:
| L     | K     | M     | J | V     | S     | D     |
|-------|-------|-------|---|-------|-------|-------|
| 08:00 | 08:00 | 08:00 |   | 08:00 | 15:00 | 15:00 |
| 12:00 | 18:00 | 12:00 |   | 18:00 |       |       |
| 18:00 |       | 18:00 |   |       |       |       |

5. **Cola de publicaciones**: Cuando el usuario decida no publicar la entrada de manera
instantánea en sus redes sociales, la entrada pasará a la cola de publicaciones y se
enviará a la red social hasta alcanzar el siguiente horario de publicación, procesando
una entrada a la vez. Las publicaciones programadas a una hora especifica también
deberán aparecer en la cola, sin embargo, se enviaran a las redes sociales
seleccionadas al momento de su registro, en la fecha y hora programada, sin importar
que no sea en una hora preestablecida por el usuario, en los horarios de publicación.
Cada usuario podrá consultar su cola de publicaciones, visualizando las lista de las
entradas publicadas (histórico) y las pendientes.

6. **Segundo factor de autenticación**: Para iniciar sesión en la aplicación se requerirá
inicialmente un juego válido de usuario y contraseña, sin embargo, se deberá
implementar un mecanismo de MFA o 2FA con un OTP por medio de un soft token
como Google Authenticator.

7. **Espacio privado de trabajo**: Las publicaciones en cola, los horarios de publicación y
las redes sociales autorizadas, etc, son elementos únicos y configurables de manera
individual para cada usuario de la aplicación, por lo tanto, debe garantizarse su
privacidad por medio de la capa de autenticación.

## TODO LIST

- [ ] Pantalla de login y registro de usuarios
    - [ ] Págine de registro de usuarios
    - [ ] Página de inicio de sessión de usuarios
        - [ ] Usuario
        - [ ] Contraseña
- [ ] Integración con redes sociales
    - [ ] Cada usuario podrá vincular cuentas de redes sociales
    - [ ] Soporte al menos de 2 de las redes sociales mas populares (facebook,twitter,instagram,etc)
- [ ] Publicación de entradas
    - [ ] Pantalla para publicación de entradas
    - [ ] Entradas simultáneas o individuales en cualquire red social agregada
    - [ ] publicación
        - [ ] Instantanea
        - [ ] En cola
        - [ ] Programada fecha y hora específica
- [ ] Horarios de publicación
    - [ ] Crear
        - [ ] Registrar varias entradas el mismo día diferente hora
    - [ ] Modificar
    - [ ] Eliminar
    - [ ] Consultar
- [ ] Cola de publicaciones
    - [ ] Se enviará a la red social a la hora y fecha establecidos
    - [ ] Cada usuario podra consultar su cola de publicaciones
        - [ ] Historial de publicaciones
        - [ ] Publicaciones pendientes
- [ ] Segundo factor de autenticación
    - [ ] Implementar MFA o 2FA
- [ ] Espacio privado de trabajo
    - [ ] Cada configuración, publicación, horarios; son privados por usuario