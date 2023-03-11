Feature: Internationalization and Localization

  Scenario: User wants to change the language
  Given the user is already logged in or he's not yet logged in
  When he desire to change the language to the one he prefers
  Then he must select the language he wants
  Then the whole application must change to that language
  
  Scenario: Admin wants to change the language
  Given the admin is already logged in or he's not yet logged in
  When he desire to change the language to the one he prefers
  Then he must select the language he wants
  Then the whole application must change to that language
