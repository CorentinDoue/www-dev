export class Project {
  private _name: string;
  private _id: string;
  private _type: string;
  private _dateDebut: string;
  private _dateFin: string;
  private _majorLabels: Label[];
  private _labels: Label[];
  private _context: string;
  private _description: string;
  private _links: Link[];
  private _mainLink: Link;
  public open: boolean;
  private _img: string;

  constructor(name: string, id: string, type: string, dateDebut: string, dateFin: string,
              majorLabels: Label[], labels: Label[], context: string, description: string,
              links: Link[], mainLink: Link, img: string = null) {
    this._name = name;
    this._id = id;
    this._type = type;
    this._dateDebut = dateDebut;
    this._dateFin = dateFin;
    this._majorLabels = majorLabels;
    this._labels = labels;
    this._context = context;
    this._description = description;
    this._links = links;
    this._mainLink = mainLink;
    this.open = false;
    this._img = img;
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

  get type(): string {
    return this._type;
  }

  set type(value: string) {
    this._type = value;
  }

  get dateDebut(): string {
    return this._dateDebut;
  }

  set dateDebut(value: string) {
    this._dateDebut = value;
  }

  get dateFin(): string {
    return this._dateFin;
  }

  set dateFin(value: string) {
    this._dateFin = value;
  }

  get majorLabels(): Label[] {
    return this._majorLabels;
  }

  set majorLabels(value: Label[]) {
    this._majorLabels = value;
  }

  get labels(): Label[] {
    return this._labels;
  }

  set labels(value: Label[]) {
    this._labels = value;
  }

  get context(): string {
    return this._context;
  }

  set context(value: string) {
    this._context = value;
  }

  get description(): string {
    return this._description;
  }

  set description(value: string) {
    this._description = value;
  }

  get links(): Link[] {
    return this._links;
  }

  set links(value: Link[]) {
    this._links = value;
  }

  get mainLink(): Link {
    return this._mainLink;
  }

  set mainLink(value: Link) {
    this._mainLink = value;
  }

  get img(): string {
    return this._img;
  }

  set img(value: string) {
    this._img = value;
  }
}

export class Label {
  private _name: string;
  private _type: string;
  private _logo: string;
  private _link: string;

  constructor(name: string, type: string, logo: string, link: string) {
    this._name = name;
    this._type = type;
    this._logo = logo;
    this._link = link;
  }

  get name(): string {
    return this._name;
  }

  set name(value: string) {
    this._name = value;
  }

  get type(): string {
    return this._type;
  }

  set type(value: string) {
    this._type = value;
  }

  get logo(): string {
    return this._logo;
  }

  set logo(value: string) {
    this._logo = value;
  }

  get link(): string {
    return this._link;
  }

  set link(value: string) {
    this._link = value;
  }
}

export class Link {
  private _name: string;
  private _link: string;

  constructor(name: string, link: string) {
    this._name = name;
    this._link = link;
  }

  get name(): string {
    return this._name;
  }

  set name(value: string) {
    this._name = value;
  }

  get link(): string {
    return this._link;
  }

  set link(value: string) {
    this._link = value;
  }
}


