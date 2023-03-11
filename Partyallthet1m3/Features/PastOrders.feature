Feature: Set an order as past
In order to set an order as past
As a client
I must have done the order and paid it
    
    Scenario:
    Given I want to set the order as past
    Then I must have done the order first
    Then it will be considered as a past order
    Then it will be saved in the purchase history
