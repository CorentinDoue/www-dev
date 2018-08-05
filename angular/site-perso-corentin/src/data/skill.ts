import {Link} from './project';

export class Skill {
  private _name: string;
  private _description: string;
  private _experience: string;
  private _img: string;
  private _mark: number;
  private _projects: Link[];
  private _learn: boolean;


  constructor(name: string, mark: number, description: string, experience: string, projects: Link[], img: string) {
    this._name = name;
    this._description = description;
    this._experience = experience;
    this._img = img;
    this._mark = mark;
    this._projects = projects;
    this._learn = false;
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

  get experience(): string {
    return this._experience;
  }

  set experience(value: string) {
    this._experience = value;
  }

  get img(): string {
    return this._img;
  }

  set img(value: string) {
    this._img = value;
  }

  get mark(): number {
    return this._mark;
  }

  set mark(value: number) {
    this._mark = value;
  }

  get projects(): Link[] {
    return this._projects;
  }

  set projects(value: Link[]) {
    this._projects = value;
  }

  get learn(): boolean {
    return this._learn;
  }

  set learn(value: boolean) {
    this._learn = value;
  }
}

/*
"name": "R",
			"mark": 1.5,
			"description": "Language and environment for statistical computing and graphics",
			"experience": "I used it in pratical works in courses of statistics and Big Data",
			"project": [],
			"img": "r.png"
 */
