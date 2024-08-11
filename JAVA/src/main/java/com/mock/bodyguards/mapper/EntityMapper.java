package com.mock.bodyguards.mapper;

import org.mapstruct.BeanMapping;
import org.mapstruct.Mapping;
import org.mapstruct.Named;
import org.mapstruct.NullValuePropertyMappingStrategy;

import java.util.List;

public interface EntityMapper <D, E> {

    D toDto(E e);

    @Mapping(target = "id", ignore = true)
    E toEntity(D d);

    List<D> toDto(List<E> e);

    List<E> toEntity(List<D> d);

    @Named("partialUpdate")
    @BeanMapping(nullValuePropertyMappingStrategy = NullValuePropertyMappingStrategy.IGNORE)
    @Mapping(target = "id", ignore = true)
    @Mapping(target = "createdAt", ignore = true)
    @Mapping(target = "updatedAt", ignore = true)
    void partialUpdate(D d, E e);
}
