# Projeto Programação WEB

![alt text](img/logo.svg)

Site do restaurante Boa Comida (fictício);

---

**Credenciais de acesso:**

Perfil de Utilizador
: Username -> user  | Password -> password

Perfil de Administrador
: Username -> admin | Password -> password

---

**NOTA:** No caso de não ser possível a comunicação com a base de dados através do ficheiro "ligaBD.php", proceder à remoção do porto presente nesse mesmo ficheiro.

**Como está:**

```
$server = "localhost:3306";
$user = "root";
$pwd = "";
$bd = "projetoWEB";
```

**No caso de problemas deve ficar assim:**
```
$server = "localhost";
$user = "root";
$pwd = "";
$bd = "projetoWEB";
```

---

**Versão MySQL**

Para este projeto foi usada a versão 8.0.

Esta versão tem incluídas duas funções, ```UUID_TO_BIN() e BIN_TO_UUID()```, necessárias ao bom funcionamento das transações com a base de dados.

No caso de a versão de SQL ser inferior é necessário correr o seguinte script SQL:

```
DELIMITER //

    CREATE FUNCTION UUID_TO_BIN(_uuid BINARY(36))
        RETURNS BINARY(16)
        LANGUAGE SQL  DETERMINISTIC  CONTAINS SQL  SQL SECURITY INVOKER
    RETURN
        UNHEX(CONCAT(
            SUBSTR(_uuid, 15, 4),
            SUBSTR(_uuid, 10, 4),
            SUBSTR(_uuid,  1, 8),
            SUBSTR(_uuid, 20, 4),
            SUBSTR(_uuid, 25) ));
    //
    CREATE FUNCTION BIN_TO_UUID(_bin BINARY(16))
        RETURNS BINARY(36)
        LANGUAGE SQL  DETERMINISTIC  CONTAINS SQL  SQL SECURITY INVOKER
    RETURN
        LCASE(CONCAT_WS('-',
            HEX(SUBSTR(_bin,  5, 4)),
            HEX(SUBSTR(_bin,  3, 2)),
            HEX(SUBSTR(_bin,  1, 2)),
            HEX(SUBSTR(_bin,  9, 2)),
            HEX(SUBSTR(_bin, 11)) ));
    //
DELIMITER ;
```

Mais info em [MariaDB](https://mariadb.com/kb/en/guiduuid-performance/);
