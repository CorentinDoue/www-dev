export class Hobby {
  private _name: string;
  private _id: string;
  private _description: string;
  private _images: Image[];
  currentId;

  constructor(name: string, id: string, description: string, images: Image[]) {
    this._name = name;
    this._id = id;
    this._description = description;
    this._images = images;
    this.currentId = 0;
  }

  get name(): string {
    return this._name;
  }

  set name(value: string) {
    this._name = value;
  }

  get id(): string {
    return this._id;
  }

  set id(value: string) {
    this._id = value;
  }

  get description(): string {
    return this._description;
  }

  set description(value: string) {
    this._description = value;
  }

  get images(): Image[] {
    return this._images;
  }

  set images(value: Image[]) {
    this._images = value;
  }
}

export class Image {
  private _name: string;
  private _description: string;
  private _url: string;
  private _dark: boolean;

  constructor(name: string, description: string, url: string, dark: boolean = false) {
    this._name = name;
    this._description = description;
    this._dark = dark;
    this._url = url;
  }

  get name(): string {
    return this._name;
  }

  set name(value: string) {
    this._name = value;
  }

  get description(): string {
    return this._description;
  }

  set description(value: string) {
    this._description = value;
  }

  get url(): string {
    return this._url;
  }

  set url(value: string) {
    this._url = value;
  }

  get dark(): boolean {
    return this._dark;
  }

  set dark(value: boolean) {
    this._dark = value;
  }
}

