# Rio's Library Management System

FFUF Manila's take-home exam: Rio has recently opened his new library, and he has just got his first set of books. This library management system displays and stores all the book information that's currently in the catalogue of Rio's Library, as well as a book borrowing feature and a searching/filtering feature.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

## Requirements

You will only need XAMPP, or any other software stack, depending on your PC. For the development of this system, I used XAMPP. It has Apache and MySQL, which will be used in the system.

## Deployment

Once XAMPP(or any other software stack you installed) has been installed and the library management system has been downloaded, open XAMPP's control panel and start Apache and MySQL. Then, open your browser and go to 

```
localhost/phpmyadmin
```

and then type in your username and password. Click the import tab, then import the 'library.sql' file located in the schema folder of the library management system. Once that is done, you can now exit phpmyadmin and then go to 

```
localhost/Rios/
```

The username and password for it is

```
Username: admin
Password: admin
```

Now you can use the system.


## Built With

* [Codeigniter](https://codeigniter.com/)
* [Twitter Bootstrap 3](http://getbootstrap.com/docs/3.3/)
* [DataTables](https://datatables.net/)
* [jQuery](https://jquery.com/)
* [Light Bootstrap Dashboard Template](https://www.creative-tim.com/product/light-bootstrap-dashboard)

