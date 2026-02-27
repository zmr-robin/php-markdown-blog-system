<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMBS - php markdown blog system</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <div class="header">
        <h1>PMBS</h1>
        <div class="breadcrumb">
            <p>><span><a href="./index.html">Home</a></span>> <span><a href="">pmbs</a></span></p>
        </div>
    </div>

    <div class="container">
        <div class="upload-post">
            <h2>Upload a Post</h2>
            <form action="">
                <div class="postData">
                    <label for="postTitle">Post title:</label><br>
                    <input type="text" name="postTitle"><br>
                    <label for="postTitle">Post breadcrumb:</label><br>
                    <input type="text" name="postBreadcrumb"><br>
                    <label for="postAuthor">Post author:</label><br>
                    <input type="text" name="postAuthor"><br>
                    <label for="postDate">Post date:</label><br>
                    <input type="date" name="" id=""><br>
                </div>
                <div class="postFile">
                    <label id="drop-zone">
                        Drop .txt or .md file here,<br>
                        or click to upload.
                        <input type="file" id="file-input" accept=".txt,.md,text/plain,text/markdown" multiple>
                    </label>
                    <div class="preview-section">
                        <ul id="preview"></ul>
                    </div>
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>

        <div class="blog-overview">
            <div class="blog-tree" style="height: 100%;">
                <h2>Blog posts</h2>
                <div class="blog-listings">
                    <div class="blog-post">
                        <div class="blog-name-stats">
                            <h3>Example 1 <span>/<i> Views: 100</i></span></h3>
                        </div>
                        <div class="blog-controlls">
                            <button>View</button>
                            <button>Edit</button>
                            <button>Archive</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <div class="blog-name-stats">
                            <h3>Example 1 <span>/<i> Views: 100</i></span></h3>
                        </div>
                        <div class="blog-controlls">
                            <button>View</button>
                            <button>Edit</button>
                            <button>Archive</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <div class="blog-name-stats">
                            <h3>Example 1 <span>/<i> Views: 100</i></span></h3>
                        </div>
                        <div class="blog-controlls">
                            <button>View</button>
                            <button>Edit</button>
                            <button>Archive</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <div class="blog-name-stats">
                            <h3>Example 1 <span>/<i> Views: 100</i></span></h3>
                        </div>
                        <div class="blog-controlls">
                            <button>View</button>
                            <button>Edit</button>
                            <button>Archive</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <div class="blog-name-stats">
                            <h3>Example 1 <span>/<i> Views: 100</i></span></h3>
                        </div>
                        <div class="blog-controlls">
                            <button>View</button>
                            <button>Edit</button>
                            <button>Archive</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <div class="blog-name-stats">
                            <h3>Example 1 <span>/<i> Views: 100</i></span></h3>
                        </div>
                        <div class="blog-controlls">
                            <button>View</button>
                            <button>Edit</button>
                            <button>Archive</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <div class="blog-name-stats">
                            <h3>Example 1 <span>/<i> Views: 100</i></span></h3>
                        </div>
                        <div class="blog-controlls">
                            <button>View</button>
                            <button>Edit</button>
                            <button>Archive</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <div class="blog-name-stats">
                            <h3>Example 1 <span>/<i> Views: 100</i></span></h3>
                        </div>
                        <div class="blog-controlls">
                            <button>View</button>
                            <button>Edit</button>
                            <button>Archive</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-post-settings" style="display: none;">
                <h2>Settings - Example 1</h2>
                <form action="">
                    <label for="postTitle">Post title:</label><br>
                    <input type="text" name="postTitle" value="Example 1"><br>
                    <label for="postTitle">Post breadcrumb:</label><br>
                    <input type="text" name="postBreadcrumb" value="example-1"><br>
                    <label for="postAuthor">Post author:</label><br>
                    <input type="text" name="postAuthor" value="Robin Zimmer"><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>


    </div>



    <script src="./assets/js/upload.js"></script>

</body>

</html>