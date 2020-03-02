# Php-project

Este proyecto trata de una página web de compra de coches. Se pueden encontrar coches tanto deportivos clásicos, como deportivos y utilitarios modernos.

Distinguiremos dos tipos de usuario: 
  - Usuarios normales
  - Usuarios administradores

Una cuenta de usuario administrador es:
  - User: admin@admin.es
  - Password: 12345

Ambos tipos de usuarios pueden navegar por las pestañas de los vehículos y realizar compras. Mientras que los administradores tendrán también a si disposición la posibilidad de añadir, borrar, editar modelos de coches así como borrar y modificar usuarios registrados.

En la inserción de modelos de coches, es necesario, al menos, rellenar los campos de nombre, marca, potencia, año y si es clásico o no.

El administrador, podrá editar los usuarios registrados, únicamente para ascenderlos a administradores y podrá eliminar usuarios registrados, siempre y cuando no hayan realizado ninguna compra, en caso contrario, hará una recarga de la página, sin haber realizado el borrado.

La funcionalidad de compra todavía no está del todo implementada, ya que falta la petición de datos del usuario, es decir, método de pago, cuenta, dirección, etc. pero si le das a comprar, realiza la inserción en la tabla de pedido y en la tabla contiene, que está compuesta por el código del pedido y el código del modelo de vehículo que deseamos comprar.

Cada usuario puede acceder a su perfil y, dentro de él, puede cambiar su imagen de perfil, así como pedir la generación de una API_KEY, la cual será de utilidad en versiones futuras y será única al hacer uso del id del usuario(PK) y del mail, el cual debe ser único. Además, también tendrá acceso a su historial de compras en el que aparecerán todos los pedidos que dicho usuario haya realizado.

Al registrarse en la aplicación, en local no es necesario incluir fecha de nacimiento, mientras que en el servidor, si que es necesario rellenar este campo, ya que si está vacío, no realizará la inserción, por lo tanto no podrá acceder dicho usuario.


