Feature: View Items
In order to view my items
As an user
It must be inserted first

    Scenario:
        Given the uer wants to see their items
        Then they must be logged in 
        Then they can view their items if they exist in the inventory
        When there is no item they won't be able to view any item
