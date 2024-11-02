City Explorer
=============

City Explorer is a PHP-based web application that allows users to explore world cities, view details of each city, and edit city information. The application demonstrates various OOP principles and uses PDO for database interactions.

Features
--------

*   **City Listing**: Displays a list of cities with their respective country and population.
    
*   **City Details**: Shows detailed information about a selected city, including name, country, ISO codes, and population.
    
*   **Edit City**: Users can edit a city’s details such as name, ASCII name, country, ISO code, and population.
    
*   **Pagination**: City list is paginated to handle large data sets.
    
*   **Basic Authentication**: Access to edit functionality is protected by Basic Auth.
    
*   **Country Flag Display**: Shows a country’s flag based on its ISO2 code.
    
*   **Population Sorting**: Cities are sorted by population in descending order.
    

Object-Oriented Concepts
------------------------

This project follows key object-oriented programming (OOP) principles:

1.  **Encapsulation**: The WorldCityModel class encapsulates city properties, providing methods to manage city data.
    
2.  **Abstraction**: WorldCityModel and WorldCityRepository abstract the details of city data handling and database interaction.
    
3.  **Inheritance**: While inheritance is not directly used, the project can be extended to include city types with unique properties.
    
4.  **Polymorphism**: Although basic polymorphism is not implemented, methods could be overridden if additional models are added.
    
5.  **Dependency Injection**: The WorldCityRepository class receives a PDO instance in its constructor, promoting flexibility and easier testing.
    
6.  **Data Binding and Prepared Statements**: To secure and optimize database queries.
    

Usage
-----

*   **List Cities**: Go to the homepage to see a list of cities.
    
*   **View Details**: Click on a city name to view its details.
    
*   **Edit City**: Use the "Edit" link to modify city information (requires Basic Auth).
