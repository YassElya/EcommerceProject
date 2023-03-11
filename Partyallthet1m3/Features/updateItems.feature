Feature: Update the items
In order to update an item
As an admin
It must exist first
    Scenario:
    Given I want to update an item as an admin
    Then The item must exist first
    Then I must click on a button
    Then it redirects me to another page to update the product
    When I am in the page I may change item's info
