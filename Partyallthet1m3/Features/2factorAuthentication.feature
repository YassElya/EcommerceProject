Feature: 2 Factor Authentication

  Scenario: user login verification (2FA)
    Given the user logs in
    Then the user sees 2 options
    Given the user chooses QR code
    Then they scan it with their phone
    And get redirected to the user home page
