Feature: Delete Items

  Scenario: User removes items from the inventory
  Given the user is logged in
  When they access items from the inventory
  Then they may click on a delete button beside the item they want to remove
  And it gets removed from the database
