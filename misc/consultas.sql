SELECT * FROM plato
JOIN lineas_carta ON plato.id_plato = lineas_carta.id_plato
JOIN formato ON formato.id_formato = lineas_carta.id_formato;

-- carta, carta-seccion

SELECT * FROM carta
JOIN carta_seccion ON carta.id_carta = carta_seccion.id_carta
JOIN seccion ON seccion.id_seccion = carta_seccion.id_seccion;

-- carta, carta-seccion, plato

SELECT * FROM carta
JOIN carta_seccion ON carta.id_carta = carta_seccion.id_carta
JOIN seccion ON seccion.id_seccion = carta_seccion.id_seccion
JOIN plato ON seccion.id_seccion=plato.id_seccion;

SELECT * FROM carta
JOIN carta_seccion ON carta.id_carta = carta_seccion.id_carta
JOIN seccion ON seccion.id_seccion = carta_seccion.id_seccion
JOIN plato ON seccion.id_seccion=plato.id_seccion
JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
JOIN formato ON lineas_carta.id_formato=formato.id_formato;