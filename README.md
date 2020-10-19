This repository acts as the "database" for our [website](https://convoyinteractive.com). As compared to a classic relational database, we store our data "flat file".  So we benefit from a highly flexible data structure and have the whole power of modern development environments on our fingertips,  including: version control, code and content discussions, revisions, release cycles, issue tracking, etc.

## Documentation
All content is stored in [YAML](https://yaml.org/) files within a "locale" directory. We call them components.
> ***Note:*** We only support the short `.yml` extension.

### Basic components
A basic component contains at least a ***type*** and a ***body*** attribute. Nevertheless you are completely free to add as many attributes to a component as you need to.

Currently supported components: `markdown`, `text`, `quote`

```yml
type: quote
body: Purpose of a convoy is to keep movin’.
```

### Collection components
As its name implies, a collection components collects other components. So you may group your content to provide a much better structure. A collection component must include a ***type*** and a ***items*** attribute but its by far not limited to this attributes.

Supported components: `definition`, `gallery`, `group`, `list`

```yml
type: definition
items:
    - term: Vue.js
      type: text
      body: Vue is a progressive framework for building user interfaces. 
```

### Asset components
Asset components reference an additional file within the `assets` directory or a binary file on our file storage. An asset component should provide a ***path** attribute.

Supported components: `image`, `lottie`, `svg`, `video`

```yml
type: svg
path: assets/logo.svg
```

> ***Note:*** The image component accepts in addition to the `path` attribute also a `sizes` attribute to provide different images for the different size ranges.

### Relations
In most cases you'll define your components as inline components but from time to time you'll reuse your components. Therefore you may store the component in a seperate file and use it as an anonymous component.

```yml
type: component
resource: path/to/your/component
```

## External Contributions
The project is maintained by the convoyinteractive organization and is closed to contributions from the organization members only. Nevertheless, if you think you can improve our content or if you have found a typo somewhere, feel free to send in a PR.

## General Contributions Guide
Doing one thing at a time – keep your PRs small, so its easier to review and we can keep our release cycles short.

Remember, all bugfixes like typos, broken links etc. should be sent to the `production` branch. Bug fixes should never be sent to the `master` branch unless they fix contents that exist only in the upcoming release.

New content or updates should be sent to the `master` branch which contains the upcoming release.
