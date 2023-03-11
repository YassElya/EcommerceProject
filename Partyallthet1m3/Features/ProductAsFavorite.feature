Feature: Set a past product as a favorite

    Scenario:
    Given The client wants to set a product as a favorite
    Then he must be logged in
    When the product has passed his due date
    Then he can set that product as his favorite if he wants
