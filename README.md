# FinalExamBackend

Backend for Codex application

## Routes:

### Token Verification:
- **Route:** `v1/verificaToken`
- **Method:** GET
- **Description:** Endpoint to verify the validity of the authentication token.

### Authentication Test:
- **Route:** `v1/test_autenticacao`
- **Method:** GET
- **Description:** Test endpoint to verify the functionality of authentication.

### Login Test:
- **Route:** `v1/testLogin`
- **Method:** GET
- **Description:** Endpoint to perform a login test.

### User Login:
- **Route:** `v1/login`
- **Method:** POST
- **Description:** Endpoint to authenticate a user.

### User Registration:
- **Route:** `v1/accedi/{utente}/{hash?}`
- **Method:** GET
- **Description:** Route to display user registration information.

## API Routes:

### Routes for `NazioneController`

- **List All Nations:**
  - Route: `GET /v1/nazioni`
  - Description: Returns the list of all nations.

- **List Nations by Continent:**
  - Route: `GET /v1/nazioni/continente/{continente}`
  - Description: Returns the list of nations based on the specified continent.

- **Show Details of a Specific Nation:**
  - Route: `GET /v1/nazioni/{nazione}`
  - Description: Displays details of the specific nation.

### Routes for `ComuneItalianoController`

- **List All Italian Comuni:**
  - Route: `GET /v1/comuniItaliani`
  - Description: Returns the list of all Italian Comuni.

- **Show Details of a Specific Italian Comune:**
  - Route: `GET /v1/comuniItaliani/{comuneItaliano}`
  - Description: Displays details of the specific Italian Comune.

### Routes for `FilmController`

- **List All Movies:**
  - Route: `GET /v1/film`
  - Description: Returns the list of all movies.

- **List Latest Movies:**
  - Route: `GET /v1/film/ultimi/{numero}`
  - Description: Returns the latest movies based on the specified number.

- **List Movies by Category:**
  - Route: `GET /v1/categorie/film/{categoria}`
  - Description: Returns movies from a specific category.

- **Show Details of a Specific Movie:**
  - Route: `GET /v1/film/{film}`
  - Description: Displays details of a specific movie.

### Routes for `SerieTvController`

- **List All TV Series:**
  - Route: `GET /v1/serieTv`
  - Description: Returns the list of all TV series.

- **List Latest TV Series:**
  - Route: `GET /v1/serieTv/ultimi/{numero}`
  - Description: Returns the latest TV series based on the specified number.

- **List TV Series by Category:**
  - Route: `GET /v1/categorie/serieTv/{categoria}`
  - Description: Returns TV series from a specific category.

- **Show Details of a Specific TV Series:**
  - Route: `GET /v1/serieTv/{serie}`
  - Description: Displays details of a specific TV series.

## Controllers

Controllers are responsible for managing different functionalities of the application.

### AccediController

- **Description:** Manages operations related to user authentication and registration.
- **Main Methods:**
  - `login`: Authenticates a user.
  - `show`: Displays user registration information.

### CategoriaController

- **Description:** Manages operations related to categories in the application.
- **Main Methods:**
  - `index`: Returns the list of categories.
  - `show`: Displays details of a specific category.
  - `store`: Creates a new category.
  - `update`: Updates data of an existing category.
  - `destroy`: Removes a category.

### UploadController

- **Description:** Controls file uploads in the application.
- **Main Methods:**
  - `index`: Returns the upload page.
  - `store`: Processes the file upload.

### GruppoController

- **Description:** Manages operations related to user groups.
- **Main Methods:**
  - `index`: Returns the list of groups.
  - `show`: Displays details of a specific group.
  - `store`: Creates a new group.
  - `update`: Updates data of an existing group.
  - `destroy`: Removes a group.

### FilmController

- **Description:** Manages operations related to movies in the application.
- **Main Methods:**
  - `index`: Returns the list of movies.
  - `ultimi`: Returns the latest movies based on a specific number.
  - `indexCategory`: Returns movies from a specific category.
  - `show`: Displays details of a specific movie.
  - `store`: Creates a new movie.
  - `update`: Updates data of an existing movie.
  - `destroy`: Removes a movie.

### SerieTvController

- **Description:** Manages operations related to TV series in the application.
- **Main Methods:**
  - `index`: Returns the list of TV series.
  - `ultimi`: Returns the latest TV series based on a specific number.
  - `indexCategory`: Returns TV series from a specific category.
  - `show`: Displays details of a specific TV series.
  - `store`: Creates a new TV series.
  - `update`: Updates data of an existing TV series.
  - `destroy`: Removes a TV series.

### EpisodioController

- **Description:** Manages operations related to TV series episodes.
- **Main Methods:**
  - `indexSerie`: Returns the list of episodes of a specific series.
  - `ultimi`: Returns the latest episodes of a series based on a specific number.
  - `show`: Displays details of a specific episode.
  - `store`: Creates a new episode.
  - `update`: Updates data of an existing episode.
  - `destroy`: Removes an episode.

## Middleware

Middlewares are used to perform actions before or after processing a request. Below are some middlewares used in the project:

- **Authentication:**
  - **Description:** Middleware for user authentication.

- **ContattiRuoli:**
  - **Description:** Middleware to manage user permissions.