Feature: Set a Past Product as a Favorite

    Scenario:
    Given The user wants to set a product as a favorite
    Then they must be logged in
    When the product's status is set to completed
    Then they can set that product as their favorite if they wants
