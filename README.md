1.- El htaccess es una herramienta poderosa en servidores web que utilizan Apache. Su propósito principal es permitir configuraciones específicas para directorios sin necesidad de acceder al archivo principal de configuración del servidor. Aquí te menciono algunas de sus aplicaciones más comunes:
2.- la primera linea de codigo que es :RewRewriteEngine On lo que hace es reecribir las reglas de los url usando la directiva o modulo mod_rewrite
3.- Options all -Indexes esta linea de codigo, lo que hace es sencillo ocultar contenido de todos los archivos
4.-

RewriteRule ^principal$ principal.php?pagina=principal
RewriteRule ^usuario$ index.php?pagina=usuario 
RewriteRule ^marca$ index.php?pagina=marca 
RewriteRule ^modelo$ index.php?pagina=modelo 
RewriteRule ^categoria$ index.php?pagina=categoria 
RewriteRule ^productosaj$ index.php?pagina=productosaj 
RewriteRule ^proveedor$ index.php?pagina=proveedor 
RewriteRule ^empleados$ index.php?pagina=empleados 
RewriteRule ^cliente$ index.php?pagina=cliente 
RewriteRule ^entrada$ index.php?pagina=entrada 
RewriteRule ^salida$ index.php?pagina=salida 
RewriteRule ^reportentrada$ index.php?pagina=reportentrada 
RewriteRule ^reportesalida$ index.php?pagina=reportesalida 
RewriteRule ^reporteinventario$ index.php?pagina=reporteinventario 
RewriteRule ^login$ index.php?pagina=login 
RewriteRule ^salir$ index.php?pagina=salir
RewriteRule ^Nuevo$ index.php?pagina=usuarionew
