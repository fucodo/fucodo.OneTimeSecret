# fucodo.OneTimeSecret

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Table of Contents

- [Description](#description)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## Description

`fucodo.OneTimeSecret` is a secure, simple service for sharing secrets or private information via a one-time URL. Once the URL is opened and viewed, the secret is deleted, ensuring that sensitive information is never exposed more than once.

## Features

- **One-Time Access:** Ensure sensitive information is accessed only once.
- **Self-Destruct:** Secrets are deleted after being accessed.
- **Expiration:** Set expiration times for secrets ensuring they're not accessible indefinitely.

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- neos/flow

### Steps

1. require the repo

    ```bash
    composer req fucodo/onetimesecret
    ```
   
## Usage

1. Create a new secret via the appropriate API endpoint or web form.

    ```php
    // Example code snippet for creating a secret
    $secretService = new \fucodo\OneTimeSecret\Domain\Model\Secret('YourSecret');
    ```

2. Share the generated one-time URL with the intended recipient.

3. When the recipient opens the URL, they will see the secret. It will be deleted after viewing.

## Contributing

We welcome contributions! Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For any issues or questions, please open an issue on GitHub or contact the maintainer at [email@example.com](mailto:email@example.com).
