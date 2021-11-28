CREATE TABLE 'products'(
    'name' varchar(200) NOT NULL,
    'image' text NOT NULL,
    'price' double(4,2) NOT NULL
);

INSERT into 'products' (name, price) values
    ('Sledgehammer','images/Sledgehammer.png', 125.75),
    ('Axe','images/Axe.jpg', 190.50),
    ('Bandsaw','images/Bandsaw.jpg',562.131),
    ('Chisel','images/Chisel.jpeg', 12.9),
    ('Hacksaw','images/Hacksaw.png', 18.45);


