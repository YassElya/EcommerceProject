Feature: Delete items

  Scenario: Admin removes items from the inventory
  Given the admin is logged in
  When he accesses items from the inventory
  Then he may click on a button delete beside the item he wants to remove
  And it gets removed from the database
