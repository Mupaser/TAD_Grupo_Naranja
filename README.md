# Memoria
El grupo naranja se propone diseñar una página web llamada CASEJA que permita a usuarios comprar piezas de coche, a continuación, en este documento se explica el proceso de realización de dicho proyecto.
## Grupo
Miembros:  
- Sergio Parejo Muñoz
- José Antonio Gutiérrez Inurria
- Carlos Lacave Muñoz
 
Color asignado: Naranja

Tema: Ecommerce de piezas de coches
## Diagrama
```mermaid
erDiagram
User {
	primaryKey id
	string name
	string lastName
	string emailAddress
	string password
	integer phone
	foreignKey rol_id
	foreignKey payment_id
}
Rol {
	primaryKey id
	string name
	text description
}
Payment {
	primaryKey id
	string name
}
Address {
	primaryKey id
    string country
    string city
	string street
	integer zipCode
	foreignKey user_id
}
Discount {
	primaryKey id
	string name
	string code
	double percentage
	boolean valid
}
Order {
	primaryKey id
	double totalPrice
	enum state
	string address
	integer phone
	string payment
	foreignKey user_id
	foreignKey discount_id
}
OrderLine {
	primaryKey id
    string pieceName
	integer number
	double totalPrice
	foreignKey order_id
	foreignKey piece_id
}
FavoritesList {
	primaryKey id
	foreignKey user_id
}
FavoritesList_Piece {
	primaryKey id
	foreignKey favoritesList_id
	foreignKey piece_id
}
Cart {
	primaryKey id
	foreignKey user_id
}
CartLine {
	primaryKey id
	integer number
	double totalPrice
	foreignKey cart_id
	foreignKey piece_id
}
Piece {
	primaryKey id
    string name
	double price
	enum estate
	double offer
	text description
	string image
}
Category_Piece {
	primaryKey id
	foreignKey piece_id
	foreignKey category_id
}
Category {
	primaryKey id
	string name
	text description
}
Rol |o--o{ User : assigned
Payment |o--o{ User : selected
User ||--o{ Address : have
User |o--o{ Order : purchase
User ||--|| FavoritesList : have
User ||--|| Cart : have
Discount |o--o| Order : used
Order |o--|{ OrderLine : have
Cart ||--o{ CartLine : have
Piece |o--o{ OrderLine : belongs
FavoritesList ||--o{ FavoritesList_Piece : have
Piece ||--o{ FavoritesList_Piece : belongs
Piece |o--o{ CartLine : belongs
Piece ||--o{ Category_Piece : belongs
Category ||--o{ Category_Piece : have
```
## Objetivos
El objetivo del proyecto es desarrollar una página web que permita comprar piezas de coches. 

De este modo, los objetivos principales del proyecto son los siguientes: 
![image](https://github.com/user-attachments/assets/88df9479-658d-4c5a-b1a2-0b4f278f4e03)
![image](https://github.com/user-attachments/assets/c234e18a-bc37-47ae-b867-5a347dbca1b1)

## Requisitos funcionales y no funcionales
En base a los objetivos establecidos anteriormente se derivan los siguientes requisitos funcionales, los cuales describen aspectos integrales del funcionamiento de la página web. 
![image](https://github.com/user-attachments/assets/09bfda8a-55e8-4fce-b325-9b03dca3473c)
![image](https://github.com/user-attachments/assets/7f1a8119-1c01-4775-83fa-cd1faa778e27)
![image](https://github.com/user-attachments/assets/cea93341-0103-4564-b65e-8701c2730aa2)
![image](https://github.com/user-attachments/assets/f52738af-3624-42f9-9345-0feb8ac2b228)
![image](https://github.com/user-attachments/assets/c19a29b1-a61c-4404-8bc1-4f2c6796c2b5)
![image](https://github.com/user-attachments/assets/550e55b8-0f73-40c2-ad46-7860ee65c5f3)

A continuación, se describen los requisitos no funcionales, los cuales resumen apartados del proyecto cómo las tecnologías requeridas o aspectos de diseño. 
![image](https://github.com/user-attachments/assets/8a293d38-73e8-4981-8d0c-fad87e07f6b7)
![image](https://github.com/user-attachments/assets/4521cfa2-9a6a-4ea3-a18f-f7e9bcc7157a)
![image](https://github.com/user-attachments/assets/6a15e712-9762-4898-b492-f1ddeffe08dd)

## Casos de Uso y Diagrama de Casos de Uso
A continuación, se observa el diagrama de casos de uso. 
![image](https://github.com/user-attachments/assets/9192cfec-7829-4e87-8cb2-c28201123aa7)

A continuación, se describirán con mayor detalle los casos de uso del diagrama. 
![image](https://github.com/user-attachments/assets/422bb5d1-f9ea-488d-a48e-3e31630594a0)
![image](https://github.com/user-attachments/assets/43238554-3225-4888-afe6-acf5418c9c3a)
![image](https://github.com/user-attachments/assets/11cd7ead-1c8a-447c-a221-2b0a7dbe8716)
![image](https://github.com/user-attachments/assets/aedcd322-3fef-4c6f-85cf-087a1ab3b2cf)
![image](https://github.com/user-attachments/assets/35d256f7-3ba1-40ed-9a40-d40c5f55084e)
![image](https://github.com/user-attachments/assets/218fc611-1f83-4776-9ea0-76e62a2242c7)
![image](https://github.com/user-attachments/assets/f461da25-5cb6-4ff5-8a30-b86b2c5f2ec6)
![image](https://github.com/user-attachments/assets/0792965a-6c3f-4284-a73a-e8e28ddebfd9)
![image](https://github.com/user-attachments/assets/203c5177-0ec0-4c1a-a38f-0770396c52e1)
![image](https://github.com/user-attachments/assets/81d65eb6-1e0a-4f99-ba27-9201c15fbf67)
![image](https://github.com/user-attachments/assets/9d1457d0-43fd-4940-8dd1-93c3229f4d28)
![image](https://github.com/user-attachments/assets/ce9bff21-b4d2-4eb0-8d7b-883bb66f6cb3)
![image](https://github.com/user-attachments/assets/c201e1bb-bd53-4278-a6f7-00f890f5365c)
![image](https://github.com/user-attachments/assets/60189e18-c875-4b9a-8b0b-2ad48c44d9c0)
![image](https://github.com/user-attachments/assets/e696cb19-8b55-4f2a-a6c2-a4bdefee14b8)
![image](https://github.com/user-attachments/assets/45ed9c65-61eb-4f6f-8a48-a3cd5e64bdfa)
![image](https://github.com/user-attachments/assets/c9f3f89c-9f0a-4dbe-be10-35b9b9b93bef)
![image](https://github.com/user-attachments/assets/3a33b3b5-1fbe-4f2c-a7a8-edfe2ba1a88e)
![image](https://github.com/user-attachments/assets/ac55f4a9-2e1b-4f10-ba74-1dbeec0801a7)
![image](https://github.com/user-attachments/assets/eb89d389-d8dd-4c6c-b33f-4c1f9580dd52)
![image](https://github.com/user-attachments/assets/f25e7a47-2544-4541-82ac-fc0e504c6f3b)
![image](https://github.com/user-attachments/assets/22ec5071-3fe4-4db9-ae2a-efc0b41cb2de)
![image](https://github.com/user-attachments/assets/a55f1718-864b-4f09-b56b-2cb0bb1e0289)
![image](https://github.com/user-attachments/assets/61bad86a-55b0-471e-a7a6-7b6de994bf1e)
![CU-25](https://github.com/user-attachments/assets/ccaed5a7-45bb-4434-a1e9-a8ec5bc2321e)
![CU-26](https://github.com/user-attachments/assets/be5b73f9-b0c5-4da5-8ca4-e5688c46460e)
![CU-27](https://github.com/user-attachments/assets/a90555cb-e2d7-466c-8b3a-8d64c6a077e1)
![CU-28](https://github.com/user-attachments/assets/f563b4ce-03ec-4793-98c0-bb0d58c4ccdb)


## Mock-up
A continuación, se muestra un esqueje de muy al principio del proyecto con ideas para la página de inicio
![image](https://github.com/user-attachments/assets/c2c4b597-cf04-404b-afbe-caa7500c9196)
