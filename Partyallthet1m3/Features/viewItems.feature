Feature: View items as an admin
In order to view my items
As an admin
It must be inserted first
    Scenario:
    Given the admin wants to see his items
    Then he must log in 
    Then he can view his items if they exist in the inventory
    When there's no item he won't be able to view any item
