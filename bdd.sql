CREATE TABLE post(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    content TEXT(650000) NOT NULl,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE category(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE post_category(
    post_id int UNSIGNED NOT NULL,
    category_id int UNSIGNED NOT NULL,
    PRIMARY KEY (post_id, category_id),
    CONSTRAINT fk_post
        FOREIGN KEY (post_id)
        REFERENCES post (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    CONSTRAINT fk_category
        FOREIGN KEY (category_id)
        REFERENCES category (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
)
CREATE TABLE panier(
    client_id int UNSIGNED NOT NULL AUTO_INCREMENT,
    name_post VARCHAR(255) NOT NULL,
    content TEXT(650000) NOT NULl,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (client_id),
    CONSTRAINT fk_client
        FOREIGN KEY (client_id)
        REFERENCES client (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
)
CREATE TABLE user(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)
CREATE TABLE client(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    date date NOT NULL,
    PRIMARY KEY (id)
)

SELECT *
FROM post_category pc
LEFT JOIN category c ON pc.category_id = c.id
WhERE pc.post_id = 1

SELECT p.name, p.prix, p.quantite, c.nom
FROM category c
LEFT JOIN produit p ON c.code = p.code_p
