# EcommerceProject
The name of the company: partyallthet1m3

## Team members
Sonia Vetra and Yassine El Yamani

## Description of project
Our team will create an inventory system to help our client stay organized and updated on her items.

She owns a small balloon business, where she makes 'bouquets' or balloons for special occasions (parties, retirements, etc.). She opperates from home, alone, and currently keeps track of her stock via Excel, which can get pretty messy. This is where our web application comes in.
The software we will develop will have 5 databases related to her inventory and orders: balloons, items, clients, status, and orders.
  - Balloons will store different types of balloons, based on color, size, shape, and more.
  - Items will store extra items our client uses in her 'bouquets'. Some examples would include plushies, ribbons, and baskets.
  - Clients will simply consists of her clients, as well as different methods to contact them.
  - Status will have the order numbers and the status of the order.
  - Orders will be the big table that links them all together. It will take from balloons and items what it needs for said order, the client's name from the client table and the status of the order from the status table.

The different pages will include a simple login/register page, a menu sidebar once logged in, different pages for the tables (to view/search and another to add/update/delete for each), a report page, a past orders page, a low stock page, and a new order/delete order page. The menu sidebar would be present at every screen to keep an easy flow throughout the web application. If a table is choosen, a page with its view will appear and some buttons will allow the user to modify or search through it. The Past Orders Page will have square containers which are formed with a picture (which the user needs to upload to the web application) and the sell price of that order.

Basic tables will be the following -> Balloons, Items, Clients, and Status tables

## Features
### Feature 1:
- Login/Logout: The user will need a username and password (which will be stored in the Admins table) to acces the application. Once they enter their login information, they can also logout.
### Feature 2:
- Register as a user: The user can register. They will enter their desired username and password (password needs to pass some standards, if not, it will be refused) and the information will be stored in the Admins table. They will then be able to login to access the application. This feature is in place with the idea that our client would like to expend her business and may hire associates in the future.
### Feature 3:
- Add to basic tables: The user will be able to add information to the basic tables.
### Feature 4:
- Update basic tables: The user will be able to update information from the basic tables.
### Feature 5:
- Delete from basic tables: The user will be able to delete information from the basic tables.
### Feature 6:
- View basic tables: The user will be able to view information from the basic tables.
### Feature 7:
- Search within in basic tables: The user will be able to search for information from the basic tables. It will act like a simple search tool. If the user enters 'bl' in the Balloons table search, they will recieve the view of any balloon that has 'Blue' or 'Black' as their color.
### Feature 8:
- Low Stock Page: The user will be able to view the balloons and items which are low in stock (ex: <5 for balloons and <2 for items).
### Feature 9:
- Report Page: The user will have access to a Report made with information thoughout the month. It will save data like the best selling balloons/items, the amount spend on supplies, gross earnings and net earning. If our client wants anything specific, we can also add it in the future.
### Feature 10:
- New Order/Delete Order Page: The user will have access to these pages to add a full order, or to delete one. If they are creating one, they will be asked for information such as client, balloons/items needs, sell price, and more. This data will all be added in the tables at the same time. To delete an order, the client will simply need to enter an order ID.
### Feature 11:
- Orders table: This table isn't prebuild. instead, it is formed dynamically with information in the other tables. This table is used as a simple way to view the client's current projects. 
### Feature 12:
- Past Orders Page: The user will be able to see pictures and sell prices of orders they've done in the past. It will allow them to keep track of price points and past designs.
### Feature 13:
- Favorite option in Past Orders Page: The user will be able to favorite a past order, so it will have an extra heart in the corner of the image. On that page, they will be able to toggle 'Favorite' mode to see only favorited orders.
### Feature 14:
- 2 Factor Authentication ?
### Feature 15:
- Internalization/Localization (FR/QC and ENG/Canada) ?
### Feature 16:
- Cookies: The web application will keep track of the user's username and password if they so desire.
