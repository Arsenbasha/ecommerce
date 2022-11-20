CREATE TABLE Producto (
    IdProducto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomProducto VARCHAR(70) NULL,
    descProducto VARCHAR(150) NULL,
    precioProducto numeric(6, 2) NULL,
    img VARCHAR(100) NULL,
    stock int null,
    CONSTRAINT pk_producto
);

INSERT INTO `Producto` (`IdProducto`, `nomProducto`, `img`, `descProducto`, `precioProducto`, `stock`) VALUES ('1', 'test', 'assets/logo.png', 'test para producto bbdd', '1000.99', '1000');
INSERT INTO `Producto` (`IdProducto`, `nomProducto`, `img`, `descProducto`, `precioProducto`, `stock`) VALUES (0, 'test2', 'assets/logo.png', 'test 2  para producto bbdd', '3212.99', '100');