# PHPBridge: Suggestotron

This is the repository containing the completed Suggestotron application for [PHPBridge's Introduction to PHP](http://phpbridge.org/intro-to-php).

Each Chapter of the curriculum (where applicable) has it's own tag, allowing you to checkout the application as you follow along.

To see the list of tags, run the following in your terminal:

```sh
git tag
```

To get started, checkout the first tag:

```sh
git checkout Chapter_04_Add_The_Project_To_A_Git_Repo 
```

## Running the Application

To run the application, use PHPs built-in CLI server. In the root of the
checkout:

```sh
php -S 0.0.0.0:8080 -t ./public/
```

The application will be accessible at <http://localhost:8080>.

## Fork and Continue!

Feel free to continue development of this application. To do so, you will want "Fork" it. To learn about forking, check out <https://guides.github.com/activities/forking>.

*To continue from where we left off*, you will need to set the master branch to the completed application by running the following.

```sh
git reset --hard Chapter_18_Completing_Suggestotron
git push -f origin master
```
