import { TestBed } from '@angular/core/testing';

import { ZapatillasLocal } from './zapatillas-local';

describe('ZapatillasLocal', () => {
  let service: ZapatillasLocal;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ZapatillasLocal);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
