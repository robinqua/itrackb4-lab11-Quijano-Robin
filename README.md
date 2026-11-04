
# Book CRUD

## G1
The route name and controller parameter must match, and the controller needs the model type. If one is wrong, Laravel may not find the book.

## G2
The link sent a GET request, but delete needs DELETE. That is why it showed a 404.

## G3
Without the second value, the edit form may be blank at first. Without `old()`, my typed values disappear when validation fails.
