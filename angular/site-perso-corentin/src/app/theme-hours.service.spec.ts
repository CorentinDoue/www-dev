import { TestBed, inject } from '@angular/core/testing';

import { ThemeHoursService } from './theme-hours.service';

describe('ThemeHoursService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ThemeHoursService]
    });
  });

  it('should be created', inject([ThemeHoursService], (service: ThemeHoursService) => {
    expect(service).toBeTruthy();
  }));
});
