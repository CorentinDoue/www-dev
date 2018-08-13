export interface Credentials {
  email: string;
  password: string;
  remember: boolean;
}

export interface Session {
  id: string;
  email: string;
  firstName: string;
  lastName: string;
  role: string;
  bedroomnumber: string;
  type: string;
  token: string;
  exp: number;
}
