Feature: The report page

    Scenario: The admin accesses the report page
    Given The admin is logged in
    Then he wants to know everything about his company's profit throughout the month
    When he clicks on a report page link or button
    Then he must be redirected to it
    When he is in the page he must see the best selling balloons/items
    And other info about his earnings
