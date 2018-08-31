export interface Credentials {
  email: string;
  password: string;
  remember: boolean;
}

export interface SetPassword {
  formerPwd: string;
  newPwd: string;
}

export interface Session {
  id: number;
  email: string;
  firstName: string;
  lastName: string;
  role: string;
  bedroomnumber: string;
  type: string;
  token: string;
  exp: number;
  room1: number | null;
  room2: number | null;
  room3: number | null;
}
