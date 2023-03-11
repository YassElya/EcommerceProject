Feature: Deleting Order Process
As a user
I must be able to delete an order

    Scenario:
    Given my client cancels an order
    Then I must click enter an order id
    And it removes the order from the database
