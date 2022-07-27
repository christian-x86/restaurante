SELECT * FROM plato
JOIN lineas_carta ON plato.id_plato = lineas_carta.id_plato
JOIN formato ON formato.id_formato = lineas_carta.id_formato;

-- carta, carta-seccion

SELECT * FROM carta
JOIN carta_seccion ON carta.id_carta = carta_seccion.id_carta
JOIN seccion ON seccion.id_seccion = carta_seccion.id_seccion;

-- carta, carta-seccion, plato

SELECT *
FROM carta
JOIN carta_seccion ON carta.id_carta = carta_seccion.id_carta
JOIN seccion ON seccion.id_seccion = carta_seccion.id_seccion
JOIN plato ON seccion.id_seccion=plato.id_seccion;

SELECT *
FROM carta
JOIN carta_seccion ON carta.id_carta = carta_seccion.id_carta
JOIN seccion ON seccion.id_seccion = carta_seccion.id_seccion
JOIN plato ON seccion.id_seccion=plato.id_seccion
JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
JOIN formato ON lineas_carta.id_formato=formato.id_formato;

SELECT carta.nombre AS `Carta`, seccion.nombre AS `Sección`, plato.nombre AS `Nombre del plato`, formato.nombre AS `Formato`, lineas_carta.precio
FROM carta
JOIN carta_seccion ON carta.id_carta = carta_seccion.id_carta
JOIN seccion ON seccion.id_seccion = carta_seccion.id_seccion
JOIN plato ON seccion.id_seccion=plato.id_seccion
JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
JOIN formato ON lineas_carta.id_formato=formato.id_formato
WHERE carta.id_carta=2
ORDER BY plato.nombre, formato.nombre;

-- (3)
SELECT carta.nombre AS `Carta`, seccion.nombre AS `Sección`, plato.nombre AS `Nombre del plato`, formato.nombre AS `Formato`, lineas_carta.precio
FROM carta
JOIN seccion ON carta.id_carta = seccion.id_carta
JOIN plato_seccion ON seccion.id_seccion = plato_seccion.id_seccion
JOIN plato ON plato_seccion.id_plato=plato.id_plato
JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
JOIN formato ON lineas_carta.id_formato=formato.id_formato
WHERE carta.id_carta=1
ORDER BY plato.nombre, formato.nombre;

SELECT carta.nombre AS `Carta`, seccion.nombre AS `Sección`, plato.nombre AS `Nombre del plato`, formato.nombre AS `Formato`, lineas_carta.precio
FROM carta
JOIN seccion ON carta.id_carta = seccion.id_carta
JOIN plato_seccion ON seccion.id_seccion = plato_seccion.id_seccion
JOIN plato ON plato_seccion.id_plato=plato.id_plato
JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
JOIN formato ON lineas_carta.id_formato=formato.id_formato
ORDER BY carta.id_carta, seccion.id_seccion, plato.nombre, formato.id_formato;