Feature: API

  Scenario: Fetch a recipe by id
    Given A recipe with id "1" and title "Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad"
    When I look for recipe for id "1"
    Then Recipe with below data will be returned:
    | id  | title                                                      | cuisine |
    | 1   | Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad | asian   |

  Scenario: Fetch all recipe for specific cuisine with limit
    Given A recipe with id "1" and title "My special recipe"
    And Recipe belongs to "indian" cuisine
    When I look for recipe belongs to "indian" cuisine
    Then All recipes with indian cuisine will be returned

  Scenario: Rate recipe
    Given A recipe with id "1" and title = "My special recipe"
    When Someone gives rating between 1 to 5
    Then Rating should be added for that recipe

  Scenario: Update recipe
    Given A recipe with id "1" and title = "My special recipe"
    When I change title to "My special recipe new title"
    Then Recipe with below data will be returned:
      | id  | title                                                      | cuisine |
      | 1   | Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad | asian   |

  Scenario: Create new recipe
    Given A recipe with title "Best recipe"
    When I create recipe record
    Then Recipe should be created