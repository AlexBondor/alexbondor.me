/**
 * Created by Alex on 2/6/2016.
 */

var canvas;
var context;
var width;
var height;

var snake_array;
var direction;
var cell_width;
var initial_length = 5;

var lastDownTarget;

window.onload = function () {
    // If mobile device then do not display game
    if ($(window).width() < 992) {
        return;
    }

    document.addEventListener('mousedown', function (event) {
        lastDownTarget = event.target;
        if (lastDownTarget == $('#snake')[0]) {
            init();
        }
    }, false);

    document.addEventListener('keydown', function (e) {
        if (lastDownTarget == canvas) {
            e.preventDefault();
            var key = e.which;
            switch (key) {
                case 37:
                    if (direction != "right") {
                        direction = "left";
                    }
                    break;
                case 38:
                    if (direction != "down") {
                        direction = "up";
                    }
                    break;
                case 39:
                    if (direction != "left") {
                        direction = "right";
                    }
                    break;
                case 40:
                    if (direction != "up") {
                        direction = "down";
                    }
                    break;
            }
        }

    }, false);
};

function init() {
    canvas = $('#snake')[0];
    context = canvas.getContext("2d");
    width = $('#snake').width();
    height = $('#snake').height();

    snake_array = [];
    direction = "right";
    cell_width = width / 28;
    create_map();
    create_snake();
    create_food();

    if (typeof game_loop != "undefined") {
        clearInterval(game_loop);
    }
    game_loop = setInterval(paint, 60);
}

function create_map() {
    for (var i = 0; i < 30; i++) {
        for (var j = 0; j < 30; j++) {
            context.strokeStyle = "#c5c5cd";
            context.strokeRect(i * cell_width, j * cell_width / 2, cell_width, cell_width / 2);
        }
    }
}

function create_snake() {
    for (var i = 0; i < initial_length; i++) {
        snake_array.push({x: (initial_length - i - 1), y: 0});
    }
}

function create_food() {
}

function paint() {
    // Refresh the background of the game box
    context.fillStyle = "white";
    context.fillRect(0, 0, width + 20, height + 20);
    create_map();

    var newX = snake_array[0].x;
    var newY = snake_array[0].y;

    switch (direction) {
        case "right":
            newX++;
            break;
        case "left":
            newX = newX == 0 ? 29 : newX - 1;
            break;
        case "up":
            newY = newY == 0 ? 29 : newY - 1;
            break;
        case "down":
            newY++;
            break;
    }

    var tail = snake_array.pop();
    tail.x = newX % 30;
    tail.y = newY % 30;
    snake_array.unshift(tail);

    // Paint the updated snake
    for (var i = 0; i < snake_array.length; i++) {
        var snake_cell = snake_array[i];
        //Lets paint 10px wide cells
        paint_cell(snake_cell.x, snake_cell.y, "#FF6600");
    }
}

function paint_cell(x, y, color) {
    context.fillStyle = color;
    context.fillRect(x * cell_width, y * cell_width / 2, cell_width, cell_width / 2);
    context.strokeStyle = "white";
    context.strokeRect(x * cell_width, y * cell_width / 2, cell_width, cell_width / 2);
}