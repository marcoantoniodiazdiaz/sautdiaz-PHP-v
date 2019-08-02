<?php

date_default_timezone_set ("America/Mexico_City");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//API GROUP 'CLIENTES'
$app->group('/v1', function () use ($app) {
    //CLIENTES
    $app->group('/clientes', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT * FROM `CLIENTES` ORDER BY `NOMBRE` ASC";
            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->get('/{cadena}', function (Request $request, Response $reponse) {

            $cadena = $request->getAttribute('cadena');

            $sql = "SELECT * FROM `CLIENTES` WHERE `NOMBRE` LIKE '%$cadena%' ORDER BY `NOMBRE` ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $nombre = $request->getParam('nombre');
            $calle = $request->getParam('calle');
            $numero = $request->getParam('numero');
            $colonia = $request->getParam('colonia');

            if ($calle == "" || $numero == "" || $colonia == "") {
                $direccion = "NO ESPECIFICADO";
            } else {
                $direccion = $calle." NO. ".$numero." COL. ".$colonia;
            }

            $email = $request->getParam('email');
            $telefono = $request->getParam('telefono');
            $celular = $request->getParam('celular');

            $sql = "INSERT INTO `sautdiaz4`.`CLIENTES` (`ID`, `NOMBRE`, `DIRECCION`, `EMAIL`, `TELEFONO`, `CELULAR`) VALUES (null, '$nombre', '$direccion', '$email', '$telefono', '$celular')";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');
            $nombre = $request->getParam('nombre');
            $calle = $request->getParam('calle');
            $numero = $request->getParam('numero');
            $colonia = $request->getParam('colonia');

            $direccion = $calle." NO. ".$numero." COL. ".$colonia;

            $email = $request->getParam('email');
            $telefono = $request->getParam('telefono');
            $celular = $request->getParam('celular');

            $sql = "UPDATE `sautdiaz4`.`CLIENTES` SET `NOMBRE` = '$nombre', `DIRECCION` = '$direccion', `EMAIL` = '$email', `TELEFONO` = '$telefono', `CELULAR` = '$celular' WHERE `clientes`.`ID` = $id";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "DELETE FROM CLIENTES WHERE CLIENTES.ID = $id";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'VEHICULOS'
$app->group('/v1', function () use ($app) {
    $app->group('/vehiculos', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT VEHICULOS.PLACA, MARCAS.NOMBRE AS MARCA, VEHICULOS.SUBMARCA, VEHICULOS.MODELO, CLIENTES.NOMBRE AS CLIENTE, COLORES.NOMBRE AS COLOR FROM VEHICULOS INNER JOIN MARCAS INNER JOIN COLORES INNER JOIN CLIENTES WHERE  CLIENTES.ID = VEHICULOS.CLIENTE AND VEHICULOS.MARCA = MARCAS.ID AND COLORES.ID = VEHICULOS.COLOR";
            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->get('/{cadena}', function (Request $request, Response $reponse) {

            $cadena = $request->getAttribute('cadena');

            $sql = "SELECT VEHICULOS.PLACA, MARCAS.NOMBRE AS MARCA, VEHICULOS.SUBMARCA, VEHICULOS.MODELO, CLIENTES.NOMBRE AS CLIENTE, COLORES.NOMBRE AS COLOR FROM VEHICULOS INNER JOIN MARCAS INNER JOIN COLORES INNER JOIN CLIENTES WHERE  CLIENTES.ID = VEHICULOS.CLIENTE AND VEHICULOS.MARCA = MARCAS.ID AND COLORES.ID = VEHICULOS.COLOR AND (CLIENTES.NOMBRE LIKE '%$cadena%' OR MARCAS.NOMBRE LIKE '%$cadena%' OR VEHICULOS.SUBMARCA LIKE '%$cadena%')";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->get('/placa/{cadena}', function (Request $request, Response $reponse) {

            $cadena = $request->getAttribute('cadena');

            $sql = "SELECT VEHICULOS.PLACA, MARCAS.NOMBRE AS MARCA, VEHICULOS.SUBMARCA, VEHICULOS.MODELO, CLIENTES.NOMBRE AS CLIENTE, COLORES.NOMBRE AS COLOR FROM VEHICULOS INNER JOIN MARCAS INNER JOIN COLORES INNER JOIN CLIENTES WHERE  CLIENTES.ID = VEHICULOS.CLIENTE AND VEHICULOS.MARCA = MARCAS.ID AND COLORES.ID = VEHICULOS.COLOR AND VEHICULOS.CLIENTE = $cadena";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $placa = $request->getParam('placa');
            $marca = $request->getParam('marca');
            $submarca = $request->getParam('submarca');
            $color = $request->getParam('color');
            $cliente = $request->getParam('cliente');
            $modelo = $request->getParam('modelo');

            $sql = "INSERT INTO `sautdiaz4`.`VEHICULOS` (`PLACA`, `MARCA`, `SUBMARCA`, `COLOR`, `MODELO`, `CLIENTE`) VALUES ('$placa', '$marca', '$submarca', '$color', '$modelo', '$cliente');";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{placa}', function (Request $request, Response $reponse) {

            $placa = $request->getAttribute('placa');

            $marca = $request->getParam('marca');
            $submarca = $request->getParam('submarca');
            $color = $request->getParam('color');
            $cliente = $request->getParam('cliente');
            $modelo = $request->getParam('modelo');

            $sql = "UPDATE `sautdiaz4`.`VEHICULOS`
                SET
                `PLACA` = '$placa',
                `MARCA` = '$marca',
                `SUBMARCA` = '$submarca',
                `COLOR` = '$color',
                `MODELO` = '$modelo',
                `CLIENTE` = '$cliente'
                WHERE `PLACA` = '$placa'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{placa}', function (Request $request, Response $reponse) {

            $placa = $request->getAttribute('placa');

            $sql = "DELETE FROM VEHICULOS WHERE VEHICULOS.PLACA = '$placa'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'DEPARTAMENTOS'
$app->group('/v1', function () use ($app) {
    $app->group('/departamentos', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT * FROM `DEPARTAMENTO` ORDER BY NOMBRE ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/{nombre}', function (Request $request, Response $reponse) {

            $nombre = $request->getAttribute('nombre');

            $sql = "SELECT * FROM `DEPARTAMENTO` WHERE `NOMBRE` LIKE '%$nombre%' ORDER BY NOMBRE ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $nombre = $request->getParam('nombre');

            $sql = "INSERT INTO `sautdiaz4`.`DEPARTAMENTO` (`ID`, `NOMBRE`) VALUES (NULL, '$nombre');";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $nombre = $request->getParam('nombre');

            $sql = "UPDATE `sautdiaz4`.`DEPARTAMENTO` SET `NOMBRE` = '$nombre' WHERE `departamento`.`ID` = $id;";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "DELETE FROM DEPARTAMENTO WHERE DEPARTAMENTO.ID = '$id'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'COLORES'
$app->group('/v1', function () use ($app) {
    $app->group('/colores', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT * FROM `COLORES` ORDER BY NOMBRE ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/{nombre}', function (Request $request, Response $reponse) {

            $nombre = $request->getAttribute('nombre');

            $sql = "SELECT * FROM `COLORES` WHERE `NOMBRE` LIKE '%$nombre%' ORDER BY NOMBRE ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $nombre = $request->getParam('nombre');

            $sql = "INSERT INTO `sautdiaz4`.`COLORES` (`ID`, `NOMBRE`) VALUES (NULL, '$nombre');";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $nombre = $request->getParam('nombre');

            $sql = "UPDATE `sautdiaz4`.`COLORES` SET `NOMBRE` = '$nombre' WHERE `COLORES`.`ID` = $id;";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "DELETE FROM COLORES WHERE COLORES.ID = '$id'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'SERVICIOS'
$app->group('/v1', function () use ($app) {
    $app->group('/servicios', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT SERVICIOS.ID, CLIENTES.NOMBRE AS CLIENTE, MARCAS.NOMBRE AS MARCAS, VEHICULOS.SUBMARCA, SERVICIOS.FECHA, TRABAJADORES.NOMBRE AS TRABAJADOR, TRABAJADORES.ID AS T_ID, SERVICIOS.STATUS FROM SERVICIOS INNER JOIN MARCAS INNER JOIN CLIENTES INNER JOIN TRABAJADORES INNER JOIN VEHICULOS WHERE SERVICIOS.VEHICULO = VEHICULOS.PLACA AND VEHICULOS.MARCA = MARCAS.ID AND VEHICULOS.CLIENTE = CLIENTES.ID AND SERVICIOS.TRABAJADOR = TRABAJADORES.ID ORDER BY SERVICIOS.FECHA DESC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/id/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "SELECT SERVICIOS.ID, CLIENTES.NOMBRE AS CLIENTE, MARCAS.NOMBRE AS MARCAS, VEHICULOS.SUBMARCA, SERVICIOS.FECHA, TRABAJADORES.NOMBRE AS TRABAJADOR, SERVICIOS.STATUS FROM SERVICIOS INNER JOIN MARCAS INNER JOIN CLIENTES INNER JOIN TRABAJADORES INNER JOIN VEHICULOS WHERE SERVICIOS.VEHICULO = VEHICULOS.PLACA AND VEHICULOS.MARCA = MARCAS.ID AND VEHICULOS.CLIENTE = CLIENTES.ID AND SERVICIOS.TRABAJADOR = TRABAJADORES.ID AND SERVICIOS.ID = '$id'";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/{nombre}', function (Request $request, Response $reponse) {

            $nombre = $request->getAttribute('nombre');

            $sql = "SELECT SERVICIOS.ID, CLIENTES.NOMBRE AS CLIENTE, MARCAS.NOMBRE AS MARCAS, VEHICULOS.SUBMARCA, SERVICIOS.FECHA, TRABAJADORES.NOMBRE AS TRABAJADOR, SERVICIOS.STATUS FROM SERVICIOS INNER JOIN MARCAS INNER JOIN CLIENTES INNER JOIN TRABAJADORES INNER JOIN VEHICULOS WHERE SERVICIOS.VEHICULO = VEHICULOS.PLACA AND VEHICULOS.MARCA = MARCAS.ID AND VEHICULOS.CLIENTE = CLIENTES.ID AND SERVICIOS.TRABAJADOR = TRABAJADORES.ID AND (CLIENTES.NOMBRE LIKE '%%' OR VEHICULOS.SUBMARCA LIKE '%%' OR MARCAS.NOMBRE LIKE '%%') ORDER BY SERVICIOS.FECHA ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $placa = $request->getParam('placa');
            $trabajador = $request->getParam('trabajador');

            $fecha = date('Y-m-d G:i');

            $sql = "INSERT INTO `sautdiaz4`.`SERVICIOS` (`ID`, `VEHICULO`, `FECHA`, `STATUS`, `TRABAJADOR`) 
                    VALUES (NULL, '$placa', '$fecha', '0', '$trabajador');";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $status = $request->getParam('status');


            if ($status == 0) {
                $status = 1;
            }

            $sql = "UPDATE SERVICIOS SET SERVICIOS.STATUS = $status WHERE SERVICIOS.ID = $id";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "DELETE FROM SERVICIOS WHERE SERVICIOS.ID = '$id'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'MARCAS'
$app->group('/v1', function () use ($app) {
    $app->group('/marcas', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT * FROM `MARCAS` ORDER BY NOMBRE ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/{nombre}', function (Request $request, Response $reponse) {

            $nombre = $request->getAttribute('nombre');

            $sql = "SELECT * FROM `MARCAS` WHERE `NOMBRE` LIKE '%$nombre%' ORDER BY NOMBRE ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $nombre = $request->getParam('nombre');

            $sql = "INSERT INTO `sautdiaz4`.`MARCAS` (`ID`, `NOMBRE`) VALUES (NULL, '$nombre');";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $nombre = $request->getParam('nombre');

            $sql = "UPDATE `sautdiaz4`.`MARCAS` SET `NOMBRE` = '$nombre' WHERE `MARCAS`.`ID` = $id;";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "DELETE FROM MARCAS WHERE MARCAS.ID = '$id'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'OPERACIONES'
$app->group('/v1', function () use ($app) {
    $app->group('/operacion', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT * FROM `OPERACION` ORDER BY `FECHA` DESC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/entradas/', function (Request $request, Response $reponse) {

            $fecha = date('Y-m-d');

            $sql = "SELECT SUM(OPERACION.CANTIDAD) AS RES FROM OPERACION WHERE OPERACION.TIPO = 0 AND CAST(OPERACION.FECHA AS DATE) = '$fecha'";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/salidas/', function (Request $request, Response $reponse) {

            $fecha = date('Y-m-d');

            $sql = "SELECT SUM(OPERACION.CANTIDAD) AS RES FROM OPERACION WHERE OPERACION.TIPO = 1 AND CAST(OPERACION.FECHA AS DATE) = '$fecha'";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $razon = $request->getParam('razon');
            $tipo = $request->getParam('tipo');
            $cantidad = $request->getParam('cantidad');

            $fecha = date('Y-m-d G:i:s');

            $sql = "INSERT INTO `sautdiaz4`.`OPERACION` (`ID`, `FECHA`, `TIPO`, `CANTIDAD`, `RAZON`) VALUES (NULL, '$fecha', '$tipo', $cantidad, '$razon');";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $razon = $request->getParam('razon');
            $tipo = $request->getParam('tipo');

            $sql = "UPDATE `sautdiaz4`.`OPERACION` SET `TIPO` = '$tipo', `RAZON` = '$razon' WHERE `operacion`.`ID` = $id;";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "DELETE FROM OPERACION WHERE OPERACION.ID = '$id'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'PAGOS'
$app->group('/v1', function () use ($app) {
    $app->group('/pagos', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT PAGOS.* FROM PAGOS INNER JOIN SERVICIOS WHERE PAGOS.SERVICIO = SERVICIOS.ID ORDER BY PAGOS.FECHA";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/{servicio}', function (Request $request, Response $reponse) {

            $servicio = $request->getAttribute('servicio');

            $sql = "SELECT PAGOS.* FROM PAGOS INNER JOIN SERVICIOS WHERE PAGOS.SERVICIO = SERVICIOS.ID AND SERVICIOS.ID = $servicio ORDER BY PAGOS.FECHA";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $cantidad = $request->getParam('cantidad');
            $servicio = $request->getParam('servicio');

            $fecha = date('Y-m-d G:i:s');

            $sql = "INSERT INTO `sautdiaz4`.`PAGOS` (`ID`, `CANTIDAD`, `FECHA`, `SERVICIO`) VALUES (NULL, '$cantidad', '$fecha', '$servicio');";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $cantidad = $request->getParam('cantidad');

            $sql = "UPDATE `sautdiaz4`.`PAGOS` SET `CANTIDAD` = '$cantidad' WHERE `pagos`.`ID` = $id;";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "DELETE FROM PAGOS WHERE PAGOS.ID = '$id'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'PRODUCTOS'
$app->group('/v1', function () use ($app) {
    $app->group('/productos', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT PRODUCTOS.ID, PRODUCTOS.NOMBRE, PRODUCTOS.PRECIO, DEPARTAMENTO.NOMBRE AS DEPARTAMENTO FROM PRODUCTOS INNER JOIN DEPARTAMENTO WHERE DEPARTAMENTO.ID = PRODUCTOS.DEPARTAMENTO AND PRODUCTOS.TIPO = 0 ORDER BY PRODUCTOS.NOMBRE";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/{nombre}', function (Request $request, Response $reponse) {

            $nombre = $request->getAttribute('nombre');

            $sql = "SELECT PRODUCTOS.ID, PRODUCTOS.NOMBRE, PRODUCTOS.PRECIO, DEPARTAMENTO.NOMBRE AS DEPARTAMENTO FROM PRODUCTOS INNER JOIN DEPARTAMENTO WHERE DEPARTAMENTO.ID = PRODUCTOS.DEPARTAMENTO AND PRODUCTOS.TIPO = 0 AND PRODUCTOS.NOMBRE LIKE '%$nombre%' LIMIT 5";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $id = rand(10000000, 99999999);

            $nombre = $request->getParam('nombre');
            $precio = $request->getParam('precio');
            $departamento = $request->getParam('departamento');
            $tipo = $request->getParam('tipo');

            $sql = "INSERT INTO `sautdiaz4`.`PRODUCTOS` (`ID`, `NOMBRE`, `PRECIO`, `DEPARTAMENTO`, `TIPO`) 
                    VALUES ('$id', '$nombre', '$precio', '$departamento', '$tipo');";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $nombre = $request->getParam('nombre');
            $precio = $request->getParam('precio');
            $departamento = $request->getParam('departamento');
            $tipo = $request->getParam('tipo');

            $sql = "UPDATE `sautdiaz4`.`PRODUCTOS` SET `NOMBRE` = '$nombre',
                     `PRECIO` = '$precio', `DEPARTAMENTO` = '$departamento', `TIPO` = '$tipo' WHERE `productos`.`ID` = $id;";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "DELETE FROM PRODUCTOS WHERE PRODUCTOS.ID = '$id'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'TRABAJADORES'
$app->group('/v1', function () use ($app) {
    $app->group('/trabajadores', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT * FROM `TRABAJADORES` ORDER BY `NOMBRE` ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->get('/{nombre}', function (Request $request, Response $reponse) {

            $nombre = $request->getAttribute('nombre');

            $sql = "SELECT * FROM `TRABAJADORES` WHERE `NOMBRE` LIKE '%$nombre%' ORDER BY `NOMBRE` ASC";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $nombre = $request->getParam('nombre');

            $sql = "INSERT INTO `sautdiaz4`.`TRABAJADORES` (`ID`, `NOMBRE`) VALUES (NULL, '$nombre');";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->put('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $nombre = $request->getParam('nombre');

            $sql = "UPDATE `sautdiaz4`.`DEPARTAMENTO` SET `NOMBRE` = '$nombre' WHERE `departamento`.`ID` = $id;";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

        $app->delete('/{id}', function (Request $request, Response $reponse) {

            $id = $request->getAttribute('id');

            $sql = "DELETE FROM DEPARTAMENTO WHERE DEPARTAMENTO.ID = '$id'";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });


    });
});

//API GROUP 'VENTAS'
$app->group('/v1', function () use ($app) {
    $app->group('/ventas', function () use ($app) {
        $app->get('/productos/{id}', function (Request $request, Response $response) {

            $id = $request->getAttribute('id');

            $sql = "SELECT PRODUCTOS.ID, DETALLE.CANTIDAD, PRODUCTOS.NOMBRE, PRODUCTOS.PRECIO, (PRODUCTOS.PRECIO * DETALLE.CANTIDAD) AS TOTAL, PRODUCTOS.TIPO FROM PRODUCTOS INNER JOIN DETALLE INNER JOIN SERVICIOS WHERE PRODUCTOS.ID = DETALLE.PRODUCTO AND DETALLE.SERVICIO = SERVICIOS.ID AND SERVICIOS.ID = $id";

            try {
                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->query($sql);
                $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($data);

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
               echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });
        $app->post('/productos/borrar', function (Request $request, Response $response) {

                $id = $request->getParam('id');
                $servicio = $request->getParam('servicio');

                $sql = "DELETE FROM DETALLE WHERE DETALLE.PRODUCTO = '$id' AND DETALLE.SERVICIO = '$servicio'";
                $sql_2 = "DELETE FROM PRODUCTOS WHERE PRODUCTOS.ID = '$id' AND PRODUCTOS.TIPO != 0";


                try {

                    $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->prepare($sql);
                    $resultado->execute();
                    $resultado = $db->prepare($sql_2);
                    $resultado->execute();
                    echo json_encode("CORRECTO");

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });
        $app->group('/agregar', function () use ($app) {
            $app->post('/productox', function (Request $request, Response $reponse) {

                $id = rand(10000000, 99999999);
                $nombre = $request->getParam('nombre');
                $precio = $request->getParam('precio');
                $tipo = $request->getParam('tipo');

                $sql = "INSERT INTO `sautdiaz4`.`PRODUCTOS` (`ID`, `NOMBRE`, `PRECIO`, `DEPARTAMENTO`, `TIPO`) 
                        VALUES ('$id', '$nombre', '$precio', '5', '$tipo')";

                $id_servicio = $request->getParam('id_servicio');
                $cantidad = $request->getParam('cantidad');

                $sql_2 = "INSERT INTO `sautdiaz4`.`DETALLE` (`SERVICIO`, `CANTIDAD`, `PRODUCTO`) VALUES ('$id_servicio', '$cantidad', '$id');";


                try {

                    $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->prepare($sql);
                    $resultado->execute();
                    $resultado = $db->prepare($sql_2);
                    $resultado->execute();
                    echo json_encode("CORRECTO");

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
            });
        });
        $app->group('/agregar', function () use ($app) {
            $app->post('/basededatos', function (Request $request, Response $reponse) {

                $id = $request->getParam('id');
                $id_servicio = $request->getParam('id_servicio');
                $cantidad = $request->getParam('cantidad');

                $sql = "INSERT INTO `sautdiaz4`.`DETALLE` (`SERVICIO`, `CANTIDAD`, `PRODUCTO`) VALUES ('$id_servicio', '$cantidad', '$id');";

                try {

                    $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->prepare($sql);
                    $resultado->execute();
                    echo json_encode("CORRECTO");

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
            });
        });
    });
});

//API GROUP 'HOME'
$app->group('/v1', function () use ($app) {
    $app->group('/home', function () use ($app) {
        $app->get('/this/', function (Request $request, Response $response) {
            $lastWeek = array();
             
            $prevMon = abs(strtotime("previous monday"));
            $currentDate = abs(strtotime("today"));
            $seconds = 86400; //86400 seconds in a day
             
            $dayDiff = ceil( ($currentDate-$prevMon)/$seconds ); 
             
            if( $dayDiff < 7 ){
                $dayDiff += 1; //if it's monday the difference will be 0, thus add 1 to it
                $prevMon = strtotime( "previous monday", strtotime("-$dayDiff day") );
           }
             
                $prevMon = date("Y-m-d",$prevMon);
             
                for($i=0; $i<7; $i++)
                {
                    $d = date("Y-m-d", strtotime( $prevMon." + $i day") );
                    $lastWeek[]=$d;
                }

            $last_week = array();

            for ($i=0; $i < 6; $i++) { 
                $last_week[$i] = $lastWeek[$i];
            }

            $this_week = array();

            for ($i=0; $i < 6; $i++) {
                $date = $lastWeek[$i];
                $mod_date = strtotime($date."+ 1 week");
                $this_week[$i] = date("Y-m-d", $mod_date);
            }

            $totales_estaSemana = array();
            $totales_semanaPasada = array();

            $info_return = array();

            $db = new db();
            $db = $db->conectDB();

            for ($i=0; $i < 6; $i++) {
                $gsent = $db->prepare("SELECT OPERACION.CANTIDAD, OPERACION.TIPO FROM OPERACION WHERE CAST(OPERACION.FECHA AS DATE) = '$this_week[$i]' UNION SELECT PAGOS.CANTIDAD, '0' FROM PAGOS WHERE CAST(PAGOS.FECHA AS DATE) = '$this_week[$i]'");
                $gsent->execute();

                $entradas = 0;
                $salidas = 0;
                while ($row = $gsent->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['TIPO'] == 0) {
                        $entradas += $row['CANTIDAD'];
                    } else {
                        $salidas += $row['CANTIDAD'];
                    }
                }
                $totales_estaSemana[$i] = $entradas-$salidas;
            }

            for ($i=0; $i < 6; $i++) {
                $gsent = $db->prepare("SELECT OPERACION.CANTIDAD, OPERACION.TIPO FROM OPERACION WHERE CAST(OPERACION.FECHA AS DATE) = '$last_week[$i]' UNION SELECT PAGOS.CANTIDAD, '0' FROM PAGOS WHERE CAST(PAGOS.FECHA AS DATE) = '$last_week[$i]'");
                $gsent->execute();

                $entradas = 0;
                $salidas = 0;
                while ($row = $gsent->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['TIPO'] == 0) {
                        $entradas += $row['CANTIDAD'];
                    } else {
                        $salidas += $row['CANTIDAD'];
                    }
                }
                $totales_semanaPasada[$i] = $entradas-$salidas;
            }

            array_push($info_return, $totales_estaSemana);
            array_push($info_return, $totales_semanaPasada);

            echo json_encode($info_return);
        });

        $app->get('/mes/', function (Request $request, Response $response) {

            $db = new db();
            $db = $db->conectDB();

            $dias = date('d');
            $parser = date('Y-m-');

            $entradas = array();
            $salidas = array();
            $pagos = array();

            $cont = 0;
            do {
                $gsent = $db->prepare("SELECT SUM(PAGOS.CANTIDAD) AS PAGOS FROM PAGOS WHERE CAST(PAGOS.FECHA AS DATE) = '" . $parser . $dias ."'");
                $gsent->execute();
                while ($row = $gsent->fetch(PDO::FETCH_ASSOC)) {
                    array_push($pagos, $row['PAGOS']);
                }


                $gsent = $db->prepare("SELECT SUM(OPERACION.CANTIDAD) AS ENTRADAS FROM OPERACION WHERE OPERACION.TIPO = 0 AND CAST(OPERACION.FECHA AS DATE) = '" . $parser . $dias ."'");
                $gsent->execute();
                while ($row = $gsent->fetch(PDO::FETCH_ASSOC)) {
                    array_push($entradas, $row['ENTRADAS'] + $pagos[$cont]);
                }
                $gsent = $db->prepare("SELECT SUM(OPERACION.CANTIDAD) AS SALIDAS FROM OPERACION WHERE OPERACION.TIPO = 1 AND CAST(OPERACION.FECHA AS DATE) = '" . $parser . $dias ."'");
                $gsent->execute();
                while ($row = $gsent->fetch(PDO::FETCH_ASSOC)) {
                    array_push($salidas, $row['SALIDAS']);
                }
                $cont++;
                $dias--;
            } while($dias != 0);

            $entradas = array_reverse($entradas);
            $salidas = array_reverse($salidas);
            $totalesES = array();
            $totales = array();
            for ($i=0; $i < sizeof($entradas); $i++) { 
                array_push($totales, $entradas[$i] - $salidas[$i]);
            }

            for ($i=0; $i < sizeof($entradas) ; $i++) { 
                if ($entradas[$i] == null) {
                    $entradas[$i] = 0;
                }
            }

            for ($i=0; $i < sizeof($entradas) ; $i++) { 
                if ($salidas[$i] == null) {
                    $salidas[$i] = 0;
                }
            }

            array_push($totalesES, $totales);
            array_push($totalesES, $entradas);
            array_push($totalesES, $salidas);
            echo json_encode($totalesES);
        });
    });
});

//AAPI GROUP 'CONFIG'
$app->group('/v1', function () use ($app) {
    $app->group('/config', function () use ($app) {
        $app->get('/', function (Request $request, Response $reponse) {
            $sql = "SELECT * FROM CONFIG";

            try {
                $db = new db();
                    $db = $db->conectDB();

                    $resultado = $db->query($sql);
                    $data = $resultado->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($data);

                    $resultado = null;
                    $db = null;

                } catch(PDOException $e) {
                    echo '{ "error" : { "text" : '.$e->getMessage().' } }';
                }
        });

        $app->post('/', function (Request $request, Response $reponse) {

            $nombre = $request->getParam('nombre');

            $fecha = date('Y-m-d G:i:s');

            $sql = "UPDATE `sautdiaz4`.`CONFIG` SET `NAME` = '$nombre' WHERE `config`.`PROFILE` = 1";

            try {

                $db = new db();
                $db = $db->conectDB();

                $resultado = $db->prepare($sql);
                $resultado->execute();
                echo json_encode("CORRECTO");

                $resultado = null;
                $db = null;

            } catch(PDOException $e) {
                echo '{ "error" : { "text" : '.$e->getMessage().' } }';
            }
        });

    });
});
