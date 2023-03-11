Feature: Update the Items
In order to update an item
As a user
It must exist first

    Scenario:
        Given I want to update an item as an user
        Then the item must exist first
        Then I must click on a button
        Then it redirects me to another page to update the product
        When I am in the page I may change item's info
