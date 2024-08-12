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

    /**
     * Partially updates an entity with the values from a DTO.
     * <p>
     * This method updates the non-null properties of the entity with the values from the DTO.
     * The properties 'id', 'createdAt', and 'updatedAt' are ignored during the update.
     * </p>
     *
     * @param d the DTO containing the new values
     * @param e the entity to be updated
     */
    @Named("partialUpdate")
    @BeanMapping(nullValuePropertyMappingStrategy = NullValuePropertyMappingStrategy.IGNORE)
    @Mapping(target = "id", ignore = true)
    @Mapping(target = "createdAt", ignore = true)
    @Mapping(target = "updatedAt", ignore = true)
    void partialUpdate(D d, E e);
}
