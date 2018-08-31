import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../../environments/environment';
import {Observable, of} from 'rxjs';
import {Excel, ExcelDTO} from '../../settings/models/excel.model';

@Injectable()
export class ExcelService {
  constructor (private http: HttpClient) {}

  public upload(excel: Excel): Observable<ExcelDTO> {
    const formData: FormData = new FormData();
    formData.append('file', excel.file);
    formData.append('filename', excel.filename);
    const url = `${environment.upiUrl}/media_objects`;
    return this.http.post<ExcelDTO>(url,  formData);
  }

  public parse(id: number): Observable<any> {
    const url = `${environment.upiUrl}/parse_excel/${id}`;
    return this.http.get(url);
  }

  public delete(id: number): Observable<any> {
    const url = `${environment.upiUrl}/media_objects/${id}`;
    return this.http.delete(url);
  }
}
