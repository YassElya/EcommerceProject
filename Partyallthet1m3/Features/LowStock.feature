Feature: Low Stock Check 
In order to be able to check if there's a lack of products
As an user
I must know when I need to buy new products
    Scenario:
    Given I have less than 5 balloons
    Then I must buy new products to put in the inventory
