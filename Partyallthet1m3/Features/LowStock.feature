Feature: Low Stock check
In order to be able to check if there's a lack of products
As an admin
I must know when do I need to buy new products
    Scenario:
    Given I have less than 5 ballons
    And I have less than 2 items
    Then I must buy new products to put in the inventory
