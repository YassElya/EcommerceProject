Feature: Search Products
In order to find items or products
As a user
I want to be able to search for that product in my database
    
    Scenario:
        Given I have a lot of items
        And I want to find a specific item
        Then I will have to search for that item
        Then the application must display that item
        And other items that have similar names
