SELECT carta.nombre AS `Carta`, seccion.nombre AS `Sección`, plato.nombre AS `Nombre del plato`, formato.nombre AS `Formato`, lineas_carta.precio
FROM carta
JOIN carta_seccion ON carta.id_carta = carta_seccion.id_carta
JOIN seccion ON carta_seccion.id_seccion = seccion.id_seccion
JOIN plato ON seccion.id_seccion=plato.id_seccion
JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
JOIN formato ON lineas_carta.id_formato=formato.id_formato
ORDER BY carta.id_carta, seccion.id_seccion, plato.nombre, formato.id_formato;