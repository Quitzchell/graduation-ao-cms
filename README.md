# AllesOnline CMS boilerplate v3

## Overview

Version 3 of our CMS updates the setup for frontend development.
We now use a minimal setup instead of the bootstrap set that is used in the previous versions of the boilerplate.

The base setup uses the following packages:
- Tailwindcss v3
- Axios
- Laravel Mix

By default, we do not include any additional libraries for frontend development

## Additional library installation:

### React

1. See https://www.npmjs.com/package/react-dom
2. Add ``.react()`` to the mix variable in the webpack.mix.js

In combination with React, we use:

#### Ziggy

- See https://github.com/tighten/ziggy#react

#### ClassNames

- See https://www.npmjs.com/package/classnames

#### Prop Types

- See https://www.npmjs.com/package/prop-types

### Inertia

- See https://inertiajs.com/server-side-setup
- See https://inertiajs.com/client-side-setup
