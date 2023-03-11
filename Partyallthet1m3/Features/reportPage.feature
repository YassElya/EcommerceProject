Feature: The Report Page

    Scenario: The user accesses the report page
        Given the user is logged in
        Then they want to know everything about their company's profit throughout the month
        When they click on a report page button
        Then they must be redirected to it
        When they are in the page they must see the best selling balloons/items
        And other info about their earnings
