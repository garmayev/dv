class Tag {
    _id;
    _title;

    get id() {
        return this._id;
    }
    set id(value) {
        this._id = value;
    }
    get title() {
        return this._title;
    }
    set title(value) {
        this._title = value;
    }

    constructor(data) {
        this.id = data?.id;
        this.title = data?.title;
    }
}

class Post {
    _title;
    _summary;
    _text;
    _image;
    _id;
    _created_at;
    _tags;

    get title() {
        return this._title;
    }

    set title(value) {
        this._title = value;
    }

    get summary() {
        return this._summary;
    }

    set summary(value) {
        this._summary = value;
    }

    get text() {
        return this._text;
    }

    set text(value) {
        this._text = value;
    }

    get image() {
        return this._image;
    }

    set image(value) {
        this._image = value;
    }

    get id() {
        return this._id;
    }

    set id(value) {
        this._id = value;
    }

    get created_at() {
        return this._created_at;
    }

    set created_at(value) {
        this._created_at = new Date(value * 1000);
    }

    get tags() {
        return this._tags;
    }

    set tags(value) {
        this._tags = value.map(item => new Tag(item));
    }

    constructor(data) {
        this.id = data?.id;
        this.title = data?.title;
        this.summary = data?.summary;
        this.text = data?.text;
        this.image = data?.image;
        this.created_at = data?.created_at;
        this.tags = data?.tags ?? [];
    }

    findByFilter(value) {
        for (const tag of this.tags) {
            if (tag.title === value) return true;
        }
        return false;
    }
}

class TagController {
    list = [];
    _filtered = [];
    container;
    _currentDate = new Date();

    constructor(container) {
        this.container = document.querySelector(container);
        this._currentDate = new Date();
        fetch("/post/index", {
            headers: {
                "content-type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
            }
        })
            .then(response => response.json())
            .then(response => {
                for (const element of response) {
                    this.list.push(new Post(element))
                }
                this._filtered = this.list;
            })
            .catch(error => {
                console.error(error)
            })
    }

    filterByYear(value, array) {
        return array.filter(item => {
            console.log(value - item.created_at.getFullYear() >= 0)
            return value - item.created_at.getFullYear() >= 0
        })
    }

    filterByMonth(value, array) {
        return array.filter(item => (item.created_at.getMonth() + 1) === value)
    }

    filterByTags(tags, array) {
        console.log(tags)
        for (const tag of tags) {
            array.filter(item => {
                // console.log(item.findByFilter(tag))
                return item.findByFilter(tag)
            })
        }
        console.log(array)
        return array
    }

    filter(year, month = undefined, tags = undefined) {
    }
}
